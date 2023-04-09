<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Comparison</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <h1 class="text-center">Database Comparison</h1>
            </div>
        </div>
        <form action="comparison.php" method="post">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="sourceHost" name="sourceHost" placeholder="Enter Host">
                        <label for="sourceHost">Host Name</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="sourceUsername" name="sourceUsername" placeholder="Enter username">
                        <label for="sourceUsername">Username</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="sourcePassword" name="sourcePassword" placeholder="Enter Password">
                        <label for="sourcePassword">Password</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="sourceDatabase" name="sourceDatabase" placeholder="Enter Database">
                        <label for="sourceDatabase">Database</label>
                      </div>
                </div>
                <div class="col-md-6 m-auto">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="targetHost" name="targetHost" placeholder="Target host">
                        <label for="targetHost">Target Host</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="targetUsername" name="targetUsername" placeholder="Target Username">
                        <label for="targetUsername">Target Username</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="targetPassword" name="targetPassword" placeholder="Enter Password">
                        <label for="targetPassword">Target Password</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="targetDatabase" name="targetDatabase" placeholder="Enter Database">
                        <label for="targetDatabase">Target Database</label>
                      </div>
                </div>
                <div class="row">
                    <div class="col-md-10 m-auto text-center">
                        <button class="btn btn-primary btn-lg" type="submit">Compare</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>