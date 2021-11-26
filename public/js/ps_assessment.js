// validates input fields sent by assessment form

function validateInputs(){
    var inputs = document.getElementsByClassName('form-control');
    var count = 0;
    
    // count number of filled inputs
    for (var inp = 0; inp < inputs.length; inp++){
        if (inputs[inp].value){
        count++;
        }
    }
    // send inputs to php script if all inputs are filled
    if (count == inputs.length){
        var inputEmail = $("#inputEmail").val();
        var inputSurgery = $("#inputSurgery").val();
        var inputProcedure = $("#inputProcedure").val();
        var inputPrescription = $("#inputPrescription").val();
        var inputCare = $("#inputCare").val();
        var inputSubject = $("#inputSubject").val();
        var checkCopy = $("#checkCopy").is('checked');
        
        $.ajax({
            type: "POST",
            url: "sendEmail.php",
            data: {inputEmail: inputEmail, inputSurgery: inputSurgery,
            inputProcedure: inputProcedure, inputPrescription: inputPrescription,
            inputCare: inputCare, inputSubject: inputSubject, checkCopy: checkCopy},
            cache: false,
            success: function(data){
                alert(data);
            },
            error: function(xhr, status, error){
                console.error(xhr);
            }
        });
        location.href = '../sendEmail.php';
        alert("Your email has been sent to the patient.");
        location.href = '../postSurgeryAssessment.php';
    }
}