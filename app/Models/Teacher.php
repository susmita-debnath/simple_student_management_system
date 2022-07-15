<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Teacher extends Model
{
    use HasFactory;
    private static $teacher;
    private static $extension;
    private static $name;
    private static $imageName;
    private static $imageURL;
    private static $directory;

    public static function getImageUrl($image) {
        self::$extension = $image->getClientOriginalExtension();
        self::$name = Str::random('10');
        self::$imageName = self::$name . '.' . self::$extension;
        self::$directory = 'teacher-images/';
        $image->move(self::$directory, self::$imageName);
    }

    public static function newTeacher($request) {
        self::$teacher = new Teacher();
        self::$teacher->name = $request->name;
        self::$teacher->email = $request->email;
        self::$teacher->password = bcrypt($request->password);
        self::$teacher->mobile = $request->mobile;
        self::$teacher->address - $request->address;
        self::$teacher->image = '';
        self::$teacher->save();
    }
}
