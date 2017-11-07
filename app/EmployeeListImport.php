<?php

namespace App;


class EmployeeListImport extends \Maatwebsite\Excel\Files\ExcelFile
{
    //
    public function getFile()
    {
    	# code...
    	$file = Input::file('file');
    	$filename = $this->doSomethingLikeUpload($file);

    	return $filename;
    }

    public function getFilters()
    {
    	return [
    		'chunk'
    	];
    }
}
