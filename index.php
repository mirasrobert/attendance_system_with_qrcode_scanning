<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">

    <style>
      * {
        font-family: 'Montserrat', sans-serif;
      }
    </style>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css"
      integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"
    />

    <title>Document</title>
  </head>
  <body>
    <section class="mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <video id="preview" style="width: 100%"></video>
            <div class="mt-3">
              <form action="home.php">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID</label>
                  <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                  />

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="exampleInputPassword1"
                  />
                  <small id="emailHelp" class="form-text text-muted"
                    >Don't share your password with anyone else.</small
                  >
                </div>
                <button id="loginBtn" type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">#ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Date/Time</th>
                    </tr>
                  </thead>
                  <tbody id="tableTbody">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </section>

    <script
      type="text/javascript"
      language="javascript"
      src="https://code.jquery.com/jquery-3.5.1.js"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
    <script
      type="text/javascript"
      src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"
    ></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
      });

      Instascan.Camera.getCameras()
        .then(function (cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        })
        .catch(function (e) {
          console.error(e);
        });

      // When webcam scans the qr code
      scanner.addListener('scan', function (qrCode) {
        getSingleData(qrCode).then(employee => {

          let form = JSON.stringify(employee);
          
          addAttendance(form).then(data => {
            viewData();
          });

          

        });
      });

    </script>
    <script
      type="text/javascript"
      language="javascript"
      src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"
    ></script>
    <script
      type="text/javascript"
      language="javascript"
      src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"
    ></script>
  </body>
</html>
