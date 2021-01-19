<?php

    use LaravelFCM\Message\OptionsBuilder;
    use LaravelFCM\Message\PayloadDataBuilder;
    use LaravelFCM\Message\PayloadNotificationBuilder;
    use App\User;
    use App\Models\Country;
    use Propaganistas\LaravelPhone\PhoneNumber;

    // use DB;

    // === Upload image to folder === 
    function uploadImage($image, $dir)
    {
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if(!in_array($image->extension(), $allowed_extensions))
        {
            return false;
        }

        $extension = $image->getClientOriginalExtension();
        $imageRename = time().'.'.$extension;

        $img = Image::make($image)->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path('uploads/'.$dir.'/'.$imageRename));

        return $imageRename;
    }
    // === End function ===
    
    // === Dekete image from folder ===
    function deleteImage($image, $dir)
    {
        $path = 'public/uploads/'.$dir.'/'.$image;
        File::delete($path);
    }
    // === End function ===

    // === Validate e164 format ===
    function check_e164Format($countryCode, $phone)
    {
        $item         = Country::where('iso', $countryCode)->select('phonecode')->first();
        $len          = strlen($item->phonecode);
        $phone_prefix = substr($phone, 0, $len);

        if ($phone_prefix == $item->phonecode) 
        {
          return false;
        }
        else
        {
          return 'number should start with '.$item->phonecode;
        }
    }
    //=== End Function ===

     // === Check if phone already exists ===
    function isUniquePhone($phone, $countryCode)
    {
        $db_format = PhoneNumber::make($phone, $countryCode)->formatE164();
        $unique    = User::where('phone_number', $db_format)->first();
        
        if($unique)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    //=== End Function ===
   
?>