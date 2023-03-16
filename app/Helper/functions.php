
<?php
function uploadFile($file): string
{
    $fileName = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/'), $fileName);
    return $fileName;
}