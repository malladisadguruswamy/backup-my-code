<?php 
// codeigniter framework excel upload functionality
if (isset($_POST['submit'])){
            if(!empty($_FILES['categories']['name'])){
                $mimes = array('application/vnd.ms-excel','text/xls','text/xlsx' ,'text/csv','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                if(in_array($_FILES["categories"]["type"],$mimes)){
                    $path = 'upload/categories_excel/';
                    if (!file_exists($path) && !is_dir($path)) {
                        @mkdir($path,0777,true);
                        @chmod($path,0777);     
                    } 
                    $rand_id = rand(100,999);  
                    $file_path = $this->upload_file_into_server( $path, $_FILES['categories'],'categories',$rand_id,'category_excel','category_excel');
                    $inputFileName = $file_path; 
                    require_once APPPATH . "/third_party/PHPExcel.php";
                    $this->load->model('Category_Model');
                    //$inputFileName = 'D:/xampp/htdocs/craftsindian/upload/categories_excel/category_excel-299-1650458531.csv'; 
                    $data = array(); $categories = array(); $rejected = array(); 
                    try {
                        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                        $objPHPExcel = $objReader->load($inputFileName);
                        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                            $i=2; $error = '';
                        foreach ($allDataInSheet as $key =>$value){  
                            $data['cat_id'] = $value['A'];
                            $data['category_name'] = $value['B'];
                            $data['category_id'] = ($value['C']) ? $value['C'] : '0';
                            $data['subcategory_id'] = ($value['D']) ? $value['D'] : '0';
                            $data['category_slug'] = $this->Common_Modal->slugify($data['category_name']);
                            if(is_string($value['B']) && !empty($value['B']) && $value['A'] !=0 && $value['A'] != '' ){
                                $insert = $this->Category_Model->upload_excel_file_data($data);
                            //$categories[] = $data;
                            // categories checking with inhiritance process
                            }
                        }
                        //$insert = $this->Category_Model->upload_excel_file_data($product_data);
                        //echo '<pre>';print_r($categories);  exit();
                        $this->session->set_flashdata('SUCCESSMSG','Data updated Successfully'); 
                        redirect('account/bulk_upload_categories_data/'); 
                    }catch (Exception $e) {
                        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                    }
                }else{
                    $this->session->set_flashdata('Fail','Please upload valid excel file');    
                    redirect('account/upload_bulk_categories/'); 
                }
            }else{
                $this->session->set_flashdata('Fail','Please upload categories file');    
                redirect('account/upload_bulk_categories'); 
            }
        }