<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('approved', 'yes')->get([
            'mark',
            'model',
            'year',
            'color',
            'price',
            'body',
            'img',
            'id'
        ]);

        return view('home', ['cars' => $cars]);
    }

    public function read($id)
    {
        // get the car info
        $car = Car::where('id', $id)->where('approved', 'yes')->first();

        // check if the car is exist
        if ($car) {
            // increment car views
            $car->increment('views');

            // get owner phone number
            $ownerPhone = $car->seller->phone;

            // return view with car info
            return view('car', [
                'car_data' => $car,
                'phone' => $ownerPhone
            ]);
        }

        // return with error message
        return response()->json(['error' => 'Car Not Found!']);
    }

    public function readCarForAdmin($id)
    {
        $car = Car::find($id);

        if ($car) {
            return view('admin.cars.car_info', ['car' => $car]);
        }

        return response()->json(['error' => 'Car Not Found!']);
    }

    public function store(Request $request)
    {
        // validate inputs
        $request->validate([
            'mark' => 'required',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required',
            'tirm' => 'required',
            'interior' => 'required',
            'body' => 'required',
            'price' => 'required',
            'transmission' => 'required',
            'desc' => 'required',
            'car_img' => 'required|mimes:jpeg,jpg,png,webp|max:10000',
        ]);

        // upload the image
        $file = $request->file('car_img');
        $newName = "car_" . Str::random(8) . "." . $file->getClientOriginalExtension();
        $destinationPath = public_path('/uploaded_cars');
        $file->move($destinationPath, $newName);

        // add new image name and seller id to the request
        $request->request->add([
            'img' => $newName,
            'seller_id' => Auth::guard('seller')->id()
        ]);

        // remove uploaded image from the request
        $request->request->remove('car_img');

        // store the car in database
        Car::create($request->all());

        // return success response message
        return redirect()->back()->withSuccess('The car has been successfully added and is awaiting approval');
    }

    public function approve($id)
    {
        Car::where('id', $id)->update([
            'approved' => 'yes'
        ]);

        return redirect()->back()->withSuccess('Car approved successfully.');
    }

    public function approved()
    {
        $cars = Car::where('approved', 'yes')->get();

        return view('admin.cars.approved', ['cars' => $cars]);
    }

    public function waiting()
    {
        $cars = Car::where('approved', 'no')->get();

        return view('admin.cars.waiting', ['cars' => $cars]);
    }

    public function updateSubmit(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['error' => 'Car Not Found.']);
        }

        if ($car->seller_id != Auth::guard('seller')->id()) {
            return response()->json(['error' => 'Not Allowed.']);
        }

        // validate inputs
        $request->validate([
            'mark' => 'required',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required',
            'tirm' => 'required',
            'interior' => 'required',
            'body' => 'required',
            'price' => 'required',
            'transmission' => 'required',
            'desc' => 'required',
        ]);

        $old_img = $car->img;

        if ($request->has('car_img')) {
            $request->validate([
                'car_img' => 'required|mimes:jpeg,jpg,png,webp|max:10000',
            ]);

            // remove old image
            $image_path = public_path("/uploaded_cars/") . $old_img;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            // upload the image
            $file = $request->file('car_img');
            $newName = "car_" . Str::random(8) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/uploaded_cars');
            $file->move($destinationPath, $newName);

            // add new image name to the request
            $request->request->add([
                'img' => $newName,
            ]);

            // remove uploaded image from the request
            $request->request->remove('car_img');
        }

        $car->update([
            'mark' => $request->mark,
            'model' => $request->model,
            'color' => $request->color,
            'year' => $request->year,
            'tirm' => $request->tirm,
            'interior' => $request->interior,
            'body' => $request->body,
            'price' => $request->price,
            'transmission' => $request->transmission,
            'desc' => $request->desc,
            'approved' => 'no',
            'img' => $request->img ?? $old_img,
        ]);

        // return success response message
        return redirect()->back()->withSuccess('The car has been successfully updated and is awaiting approval');
    }

    public function updateView($id)
    {
        $car = Car::find($id);

        if ($car->seller_id == Auth::guard('seller')->id()) {
            return view('seller.car_update', ['car' => $car]);
        }

        return response()->json(['error' => 'Not Allowed.']);
    }

    public function delete($id)
    {
        $car = Car::find($id);

        if (!$car) return response()->json(['error' => 'Car Not Found.']);

        if ($car->seller_id != Auth::guard('seller')->id()) {
            return response()->json(['error' => 'Not Allowed.']);
        }

        $this->deleteProcess($car);

        return redirect()->back()->withSuccess('Car has been deleted successfully.');
    }

    public function adminDeleteCar($id)
    {
        $car = Car::find($id);

        if (!$car) return response()->json(['error' => 'Car Not Found.']);

        $this->deleteProcess($car);

        return redirect()->back()->withSuccess('Car has been deleted successfully.');
    }

    public function deleteProcess(Car $car)
    {
        $old_img = $car->img;
        // remove old image
        $image_path = public_path("/uploaded_cars/") . $old_img;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $car->delete();
    }
}
