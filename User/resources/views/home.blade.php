@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobfinder";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if (isset($result->num_rows) && $result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th></tr>";

  while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["name"];
  }
  echo "</table>";
} else {
  echo  "no data";

}
$conn->close();
?>
<button type="button" style="background-color: indigo;" name="button">button</button>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
