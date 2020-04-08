<?php

namespace ProductBulkUpload\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductBulkUploadController extends Controller {

    public function importCSV(Request $request)
    {
        $file = $request->file('file');

		// File Details 
		$filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$tempPath = $file->getRealPath();
		$fileSize = $file->getSize();
		$mimeType = $file->getMimeType();

		// Valid File Extensions
		$valid_extension = array("csv");

		// 2MB in Bytes
		$maxFileSize = 2097152; 

		// Check file extension
		if(in_array(strtolower($extension),$valid_extension)){

			// Check file size
			if($fileSize <= $maxFileSize){

				// File upload location
				$location = 'uploads';

				// Upload file
				$file->move($location,$filename);

				// Import CSV to Database
				$filepath = public_path($location."/".$filename);

				$file = fopen($filepath, 'r');
				$all_rows = array();
				$header = fgetcsv($file);
				
				while ($row = fgetcsv($file)) {
					$all_rows[] = array_combine($header, $row);
				}
				
				foreach($all_rows as $row)
				{
					$row = array_change_key_case($row);
					$csv_data = new \App\Models\Config\Product();
					$csv_data->name = $row['name'];
					$csv_data->sku = $row['sku'];
					$csv_data->gtin = $row['gtin'];
					$csv_data->brand = $row['brand'];
					$csv_data->url = $row['url'];
					// $csv_data->image = $row['image'];
					$csv_data->price = $row['price'];
					$csv_data->currency_id = $row['currency'];
					$csv_data->status = $row['status'];
					$csv_data->save ();
				}
				return redirect()->back()->withFlashSuccess('Products imported successfully!');
			}
			return redirect()->back()->withFlashDanger('File size too large. Allowed size is 2MB');
		}
		return redirect()->back()->withFlashDanger('Not a valid file! Valid files are: '. implode(', ', $valid_extension));
    }


}