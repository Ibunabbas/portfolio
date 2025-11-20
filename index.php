<!DOCTYPE html>
<html>
<head>
    <title>Student Verification System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 25px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #777;
        }
        button {
            color: white;
            background: #007bff;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Verification</h2>

    <form id="verifyForm" action="process.php" method="POST">
        
        <label>Are you a student?</label>
        <select name="isStudent" id="isStudent">
            <option value="">-- Select Option --</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <p class="error" id="studentError">Please select an option.</p>

        <label>Do you have an ID card?</label>
        <select name="idcard" id="idcard">
            <option value="">-- Select Option --</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <p class="error" id="idError">Please select an option.</p>

        <button type="submit">Check Status</button>
    </form>
</div>

<script>
document.getElementById("verifyForm").addEventListener("submit", function(e){
    let valid = true;

    let isStudent = document.getElementById("isStudent");
    let idcard = document.getElementById("idcard");

    if(isStudent.value === ""){
        valid = false;
        document.getElementById("studentError").style.display = "block";
    } else document.getElementById("studentError").style.display = "none";

    if(idcard.value === ""){
        valid = false;
        document.getElementById("idError").style.display = "block";
    } else document.getElementById("idError").style.display = "none";

    if(!valid){
        e.preventDefault();
    }
});
</script>

</body>
</html>
