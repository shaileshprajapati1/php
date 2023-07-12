<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Add User</title>

</head>

<body>
    <main>
        <form  method="post">
            <h1>Add User</h1>
            <div>
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" id="fullname" required>
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="tel" minlength="10" maxlength="10" name="phone" id="phone" required>
            </div>
            <div>
                <label for="dob">DOB:</label>
                <input type="date" name="dob" id="dob" required>
            </div>
            <div >
                <label for="" >Gender:</label>
                <input  type="radio" name="gender" id="Male" value="Male"><label for="Male"style="display: inline">Male</label>
                <input  type="radio" name="gender" id="Female" value="Female"><label for="Female" style="display: inline;">Female</label>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password2">Password Again:</label>
                <input type="password" name="password2" id="password2" required>
            </div>
            <div>
                <label for="">Hobby:</label>
                <input type="checkbox" name="hobby[]" id="Cricket" value="Cricket"><label for="Cricket" style="display: inline">Cricket</label>
                <input type="checkbox" name="hobby[]" id="Reading" value="Reading"><label for="Reading" style="display: inline">Reading</label>
                <input type="checkbox" name="hobby[]" id="Watching Movies" value="Watching Movies"><label for="Watching Movies" style="display: inline">Watching Movies</label>
                <input type="checkbox" name="hobby[]" id="music" value="music"><label for="music" style="display: inline">Music</label>
            </div>
            <div>
                <label for="agree">
                    <input type="checkbox" name="agree" id="agree" value="yes" /> I agree
                    with the
                    <a href="#" title="term of services">term of services</a>
                </label>
            </div>
            <button  type="submit" name="add">Add User</button>
            <footer>View All User <a href="viewalluser">All User</a>
            </footer>
        </form>
    </main>
</body>

</html>