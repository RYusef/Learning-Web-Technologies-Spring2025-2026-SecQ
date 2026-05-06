<!DOCTYPE html>
<html>
<head>
    <title>Search Employee</title>
    <script src="../assets/js/search.js"></script>
</head>
<body>

<h2>Search Employee Information</h2>

<input type="text" id="search" onkeyup="searchEmployee()" placeholder="Search employee">

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Contact No</th>
            <th>Username</th>
        </tr>
    </thead>

    <tbody id="result"></tbody>
</table>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>