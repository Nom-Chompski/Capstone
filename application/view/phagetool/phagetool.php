<script type="text/javascript">
 function makeBoxes(){
    $(".js-example-basic-multiple").select2({width:"75%"});
    }
</script>
    
    <div class="container">
        <form id="phageOptions" name="options" method="post" action="/home/output">
    <table border="0" width="100%">
        <tbody>
        <tr>
            <td colspan="3">
                <h3>Preconditions</h3></br>
                <input type="radio" name="visType" value="0">Known phage &nbsp;
                <input type="radio" name="visType" value="1">Known & unknown phage<br><br>
                <input type="checkbox" name="boolTree" id="boolTree" value="1">Phylip Tree &nbsp;
                <select name="phylip visualization">
                    <option value="0">rooted</option>
                    <option value="1">unrooted</option>
                </select>
            </td>
        </tr>
    

    
        <tr>
            <td colspan="3">
                <h3>Select genus</h3>
                <select name="selGenus[]">
                    <option value="null">Any Genus</option>

                </select>
            </td>
        </tr>
    
    
    
        <tr>
            <td >
                <h3>Select phage</h3>
                <select class="js-example-basic-multiple" data-placeholder="Select Phage" name="selPhage[]" multiple="multiple">
                    <option value="null">No Phage</option>
                    
                </select>
            </td>
        
            <td >
                <h3>Select cluster</h3>
                <select class="js-example-basic-multiple" data-placeholder="Select Cluster" name="selCluster[]" multiple="multiple">
                    <option value="null">No Cluster</option>
                </select>
            </td>
        
            <td >
                <h3>Select sub-cluster</h3>
                <select class="js-example-basic-multiple" data-placeholder="Select Subcluster" name="selSubCluster[]" multiple="multiple">
                    <option value="null">No Sub-cluster</option>

                </select>
            </td>
        </tr>
    
        
   
        <tr>    
            <td >
                <h3>Enzyme presets</h3>
                <select class="js-example-basic-multiple" data-placeholder="Select Enzyme Presets" name="selPresets[]" multiple="multiple">
                    <option value="0">No preset</option>
                    <option value="1">preset 1</option>
                    <option value="2">preset 2</option>
                    <option value="3">preset 3</option>
                    <option value="4">preset 4</option>
                </select>
            </td>

            <td>
                <h3>Select NEB enzyme</h3>
                <select class="js-example-basic-multiple" name="selNeb[]" data-placeholder="Select Enzymes" multiple="multiple">
                    <option value="null">None</option>
                </select>
            </td>

            <td>
                <h3>Select cut frequency</h3>
                <select class="js-example-basic-multiple" name="selCuts[]" data-placeholder="Select Cut Frequency" multiple="multiple">
                    <option value="0">None (# of cuts = zero)</option>
                    <option value="1">Few (1 <= # of cuts <= 5)</option>
                    <option value="2">Some (5 <= # of cuts <= 16)</option>
                    <option value="3">Many (16 <= # of cuts <= 41)</option>
                    <option value="4">A lot (# of cuts >= 41)</option>
                </select>
            </td>
        </tr>
    

  
        <tr>
            <td align="right" colspan="3">
                <input type="button" id="clicker" value="Submit">
            </td>
        </tr>
 
    
    </tbody>
    </table>
</form>


<table id="resultDiv">
    <thead><tr><th></th></tr></thead>
    <tbody></tbody>
</table>

</div>

<!--<p>
   <u><bold>Features to be included:</bold></u></br>
   -Phylip (Philo-tree) generation</br>  
   -Weighted comparison of Enzyme cut information from unknown phage to known phage</br>
   -Visualization of known phage cut information</br> 
   -Visualization of unknown phage cut information</br> 
   -Guided Enzyme selection</br>
</p>-->

