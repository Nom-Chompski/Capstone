<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Dashboard extends Controller
{
    private $clusterModel;
    private $genusModel;
    private $phageModel;


    public function __construct(){
        parent::__construct();
        $this->genusModel = $this->loadModel('genus');
        $this->clusterModel = $this->loadModel('cluster');
        $this->phageModel = $this->loadModel('phage');
    }
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        
        
        $adminList = $this->userModel->getAdmin();
        $genusList = $this->genusModel->getGenusList();


    	require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/nav.php';
        require APP . 'view/dashboard/dashboard.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addGenus(){
        if(isset($_REQUEST['newGenus'])){
            $this->genusModel->addGenus($_REQUEST['newGenus']);
            header('location: /dashboard');
        }
    }

    public function addCluster($newCluster){
        $this->clusterModel->addCluster($newCluster);
    }

    public function fileupload()
    {
        
            Helper::outputArray($_POST);
            if($_POST['filetype'] == 0){
                if($_POST['genusName'] !== "null"){
                    $this->shortUpload($_POST['genusName']);
                }else{
                    echo "no genus selected";
                }
            }elseif($_POST['filetype'] == 1){
                if($_POST['genusName'] !== "null"){
                    $this->fullUpload($_POST['genusName']);
                }else{
                    echo "no genus selected";
                }
                echo "do long csv";
            }elseif($_POST['filetype'] == 2){
                $this->fastaUpload();
                echo "do fasfa";
            }

    }// end file upload

    private function shortUpload($genusName){
        $phages = array();
        $clusterMap = $this->generateClusterMap();
        //Check to see the the SuperGlobal Variable $_FILES has data
        if(isset($_FILES['userfile']['name'])){
            //print_r($_FILES);
            //CHeck for file upload error resulting in null file
            if($_FILES['userfile']['name']!=null){
                //open the uploaded file for reading
                $file = fopen($_FILES['userfile']['tmp_name'], 'r');
                $count =0;
                //while not end of file loop get line as an array
                while(!feof($file)){
                    $count += 1;
                    $line = fgetcsv($file,0,"\t") ;
                    //skips the first line of the file (colomn names)
                    if($count!=1){
                        //ignores blank phage names
                        if($line[0]!=''){
                            //if the cluster unclustered
                            if($line[1] == "Unclustered" || $line[1] == "unclustered" || $line[1] == "None" || $line[1] == "none" ){
                                $cluster[0] = null;
                                $subcluster[0] = 'None';
                            }else{
                            // do some magic to select letters then numbers !!!
                                preg_match('/[A-Za-z]+/', $line[1], $cluster);
                                preg_match('/\d+/', $line[1], $subcluster);
                                if(!isset($subcluster[0])){
                                    $subcluster[0] = 'None';
                                }
                            }
                            if(!array_key_exists($cluster[0], $clusterMap)){
                                $this->addCluster($cluster[0]);
                                $clusterMap = $this->generateClusterMap();
                            }
                        $phages[$line[0]] = array($clusterMap[$cluster[0]],$subcluster[0]);
                        }
                    }   
                }
                $this->phageModel->addShortPhage($phages,$genusName);   
            }
        }
    }//end short upload

    public function fullUpload($genusName){
        echo "full upload";

    }
    private function generateClusterMap(){
        $allClusters = $this->clusterModel->getClusterList();
        $clusterMap = array();
        foreach($allClusters as $clusterData){
            $clusterMap[$clusterData['Cluster']] = $clusterData['ClusterID'];
        }
        return $clusterMap;
    }

    public function buildPhageValues($pahges){

    }
}