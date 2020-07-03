<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../vendors/new/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body class="welcome-main-wrap">
    <div class="container-fluid">
        <div class="col-md-12 bg-gradient-light">
            <br>
            <h2 class="text-dark container" >Welcome Note</h2>
        </div>
        <form class="needs-validation container" novalidate>
            <div class="form-group">
                <div class="col-md-12 mb-3">
                    <label for="w_title">Welcome Title</label>
                    <input type="text" class="form-control" id="w_title" required>
                    <div class="invalid-feedback">
                        Please choose a welcome title.
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="w_note">Welcome Note</label>
                    <textarea name="w_note" id="w_note" class="form-control" cols="30" rows="4" style="resize: none;" required></textarea>
                    <div class="invalid-feedback">
                        Please choose a welcome note.
                    </div>
                </div>
               <div class="col-md-12">
                    <button class="btn btn-outline-primary form-control" type="submit">Submit form</button>
               </div>
            </div>
        </form>
<script src="../controllers/welcome_note.js"></script>
</body>
</html>