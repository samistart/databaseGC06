
<!DOCTYPE html>
<HTML>
<body>
<h1>Create a new report</h1>
<!--Create a form, 
Use POST which saves the data to the super global POST array. This is
more secure than GET, which displays data in the URL.
The action determins which script to run once the form is submitted. -->
<form method='post' action='process_create_form.php' name='new_user_form'>
<!--Put in a label to show the user what to enter.-->
<label>Title: </label>
<!--An input field that takes text and saves it to a vairable called fName-->
<!--A line break-->
<br>
<input type='text' name='title' size='30'>
<br>
<label>Abstract: </label>
<br>
<input type='text' name='abstract' size='100'>
<br>
<label>Content: </label>
<br>
<input type='text' name='content' size='1000'>
<br>
<!--This is a button that submits the form and is labeled 'Create new user'-->
<p><input type="submit" value="Create new report"></p>
</form>
</body>
</HTML>

