var i = 1;
var j = 1;
var z = 1;
var nbRow= 0;

function choixRep() {
    document.getElementById('inputs').innerHTML='';
}
function addPension() {
    nbRow++;

    var divInputs = document.getElementById("inputs");
    var newInput = document.createElement("div");
    var div_error = document.createElement("div");
    newInput.setAttribute('id','new_input', +nbRow);
    newInput.setAttribute('class','new_input');
    newInput.innerHTML = `
    <div class="form-row ">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Pension</label>
            <input type="text" class="form-control" id="inputEmail4">
        </div>
    </div>`;
        divInputs.appendChild(newInput);   
        i++;

}
function addAdresse() {
    nbRow++;

    var divInputs = document.getElementById("inputs");
    var newInput = document.createElement("div");
    var div_error = document.createElement("div");
    newInput.setAttribute('id','new_input', +nbRow);
    newInput.setAttribute('class','new_input');
    newInput.innerHTML = `
    <div class="form-row ">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Adresse</label>
            <input type="text" name="adresse" class="form-control" id="inputEmail4">
        </div>
    </div>`;
        divInputs.appendChild(newInput);   
        j++;

}

function addPensionNum() {
    nbRow++;

    var divInputs = document.getElementById("inputs");
    var newInput = document.createElement("div");
    var div_error = document.createElement("div");
    newInput.setAttribute('id','new_input', +nbRow);
    newInput.setAttribute('class','new_input');
    newInput.innerHTML = `
    <div class="form-row ">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Pension</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Numéro de chambre</label>
        <input type="text" name="numch" class="form-control">
        </div>
    </div>`;
        divInputs.appendChild(newInput); 
        z++;  

}

    

    
        function add(){
            var type = document.getElementById("type_etudiant");
             if (type.value == 'non') {
                alert('bouriser');
            }else{
                alert('non bouriser');
            } 
        }

