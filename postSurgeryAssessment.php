<!DOCTYPE html>
<html>
    <head>
        <title>Post-Surgery Assessment</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script type="text/javascript" src="public/js/ps_assessment.js"></script>
        <?php include "employee.php"; ?> 
        <?php include "setupDatabaseConnection.php"; ?>
        <?php include "sidebar.php"; ?>
    </head>
    <body>
        <?php echo $imgLink = add_sidebar($empRoleID ,$empName) ?>

        <div class="content-wrapper extra" style="margin-top: -25px; margin-bottom: -7px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2" style="margin-bottom: 0!important">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="padding: 30px 0.5rem; padding-bottom: 10px">Post-Surgery Assessment</h1>
                        </div>
                    </div>
                    <span style="padding: 30px 0.5rem;">Send an e-mail to your patient with instructions on what to do after their surgery.</span>
                </div>
            </div>
            <!-- Horizontal Form -->
            <div class="card card-info" style="margin-left: 25px; margin-right: 25px; margin-top: 5px">
              <div class="card-header" style="padding-bottom: 7px;">
                <h3 class="card-title">Assessment Form</h3>
                <i class="fas fa-envelope fa-2x card-title" id="envelope" style="margin-left: 10px; margin-top: -4px"></i>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="postSurgeryAssessment.php" method="POST" >
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Patient Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSubject" class="col-sm-2 col-form-label">Email Subject</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Subject of E-mail" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSurgery" class="col-sm-2 col-form-label">Surgery Type</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSurgery" name="inputSurgery" placeholder="Name of Surgery" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputProcedure" class="col-sm-2 col-form-label">Operation Procedure</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputProcedure" name="inputProcedure" placeholder="Description" required></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPrescription" class="col-sm-2 col-form-label">Prescription(s)</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputPrescription" name="inputPrescription" placeholder="Description" required></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputCare" class="col-sm-2 col-form-label">Post-Surgery Care</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputCare" name="inputCare" placeholder="Instructions" required></textarea>
                    </div>
                  </div>
                  <div class="form-group row" style="margin-bottom: -5px">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkCopy" name="checkCopy">
                        <label class="form-check-label" for="checkCopy">Send me a copy</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button id="subbtn" name="subbtn" class="btn btn-info" onclick="return validateInputs()">Send Email</button>
                  <button class="btn btn-default float-right" onclick="window.location.reload()">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </body>
</html>