<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Add any CSS stylesheets or external stylesheets here -->
    <style>
        /* Example styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #007bff; /* Blue background color */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* White background color for the container */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile {
            text-align: center;
            padding: 20px;
            background-color: #ffc107; /* Yellow background color for the profile section */
            border-radius: 10px;
            margin-bottom: 20px;
            position: relative;
        }
        .profile-picture {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            overflow: hidden;
            border: 4px solid #fff; /* Added border to profile picture */
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .edit-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }
        .profile-details {
            margin-bottom: 20px;
            font-size: 18px;
            color: #000; /* Changed text color to black */
            background-color: #ffc107; /* Same as profile box */
            border-radius: 10px;
            padding: 20px;
        }
        .bio {
            margin-bottom: 20px;
        }
        .bio p {
            margin: 0;
            font-size: 16px;
        }
        .experience-and-project-box {
            background-color: #ffc107; /* Same as profile box */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .experience,
        .work-history-box,
        .education, /* Added new class for education section */
        .project {
            margin-bottom: 20px;
        }
        .experience h2,
        .work-history-box h2,
        .education h2, /* Added new class for education section */
        .project h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .project h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .edit-profile-link,
        .logout-link {
            display: inline-block;
            background-color: #fff;
            color: #007bff; /* Blue color for the link text */
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .edit-profile-link:hover,
        .logout-link:hover {
            background-color: #0056b3; /* Darker blue on hover */
            color: #fff; /* White text color on hover */
        }
        .logout-link {
            margin-left: 10px;
            background-color: #dc3545; /* Red color for logout link */
        }
        .logout-link:hover {
            background-color: #bd2130; /* Darker red on hover */
        }
        .edit-form {
            display: none; /* Hidden by default */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 10px;
            padding: 20px;
            z-index: 1;
        }
        .edit-form input[type="text"],
        .edit-form textarea {
            width: calc(100% - 40px); /* Adjusting width to accommodate padding */
            padding: 8px 10px; /* Adjusting padding */
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            resize: vertical; /* Allowing vertical resizing */
        }
        .edit-form input[type="file"] {
            display: none; /* Hide by default */
        }
        .edit-form label {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-form label:hover {
            background-color: #0056b3;
        }
        .edit-form input[type="submit"],
        .edit-form .cancel-profile-edit {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-right: 10px;
        }
        .edit-form .cancel-profile-edit {
            background-color: #dc3545; /* Red color for cancel button */
        }
        .edit-form .cancel-profile-edit:hover {
            background-color: #bd2130; /* Darker red on hover */
        }

        /* Project Modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
            padding-top: 100px; /* Location of the box */
        }
        .modal-content {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            margin: auto;
            padding: 20px;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .project-list {
            list-style-type: none;
            padding: 0;
        }
        .project-list li {
            padding: 8px 0;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <div class="profile-picture">
                <img src="assets/images/profile.jpg" alt="Profile Picture" id="profileImg">
                <label for="profilePic" class="edit-icon">+</label>
                <input type="file" id="profilePic" name="profilePic" accept="image/*" onchange="changeProfilePicture(event)">
            </div>
            <div class="profile-details">
                <p><strong>Name:</strong> <span id="name">Rudra Narayan Hota</span></p>
                <p><strong>Email:</strong> <span id="email">rudranarayanhota9897@gmail.com</span></p>
                <!-- Add Bio section -->
                <div class="bio" id="bioContent">
                    <p><strong>Bio:</strong> I am Rudra Narayan, a final year undergraduate student pursuing my degree in Computer Science. I am passionate about software development, especially in the fields of web development. Cloud computing, and Learning new technology</p>
                </div>
                <!-- End Bio section -->
            </div>
            <button class="edit-profile-link" onclick="toggleEditForm()">Edit Profile</button>
            <a href="logout.php" class="logout-link">Logout</a>
            <form class="edit-form" id="editForm" action="update_profile.php" method="post">
                <input type="text" id="newName" name="name" placeholder="Enter new name" required>
                <input type="text" id="newEmail" name="email" placeholder="Enter new email" required>
                <textarea id="newBio" name="bio" placeholder="Enter new bio" rows="4" required></textarea>
                <input type="file" id="newProfilePic" name="newProfilePic" accept="image/*">
                <input type="submit" value="Save">
                <input type="button" class="cancel-profile-edit" value="Cancel" onclick="toggleEditForm()">
            </form>
        </div>
        <!-- Experience and Project Box -->
        <div class="experience-and-project-box">
            <div class="experience">
                <h2>Experience</h2>
                <p>Showcase your skills to recruiters with job-relevant projects Add projects here to demonstrate your technical expertise and ability to solve real-world problems.</p>
            </div>
            <!-- Work History Box -->
            <div class="work-history-box">
                <h2>Work History</h2>
                <!-- Add Work Experience button -->
                <button onclick="openWorkExperienceModal()">Add Work Experience</button>
            </div>
            <!-- End Work History Box -->
            <!-- Education Box -->
            <div class="education">
                <h2>Education</h2>
                <p>Add your educational background here to let employers know where you studied or are currently studying.</p>
                <!-- Add Education button -->
                <button onclick="openEducationModal()">Add Education</button>
            </div>
            <!-- End Education Box -->
            <div class="project">
                <h2>Projects</h2>
                <button onclick="openProjectModal()">Browse Projects</button>
            </div>
        </div>
    </div>

    <!-- Project Modal -->
    <div id="projectModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeProjectModal()">&times;</span>
            <h2>Edit Projects</h2>
            <ul class="project-list">
                <li>Project 1: Web Development</li>
                <li>Project 2: Responsive Design</li>
                <li>Project 3: JavaScript Applications</li>
                <!-- Add more projects here -->
            </ul>
            <button>Edit Projects</button>
        </div>
    </div>

    <!-- Work Experience Modal -->
    <div id="workExperienceModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeWorkExperienceModal()">&times;</span>
            <h2>Add Work Experience</h2>
            <!-- Form to add work experience details -->
            <form id="workExperienceForm" onsubmit="addWorkExperience(event)">
                <label for="institution">Name of Institution:</label><br>
                <input type="text" id="institution" name="institution" required><br><br>
                <label for="role">Role/Job Title:</label><br>
                <input type="text" id="role" name="role" required><br><br>
                <label for="startDate">Start Date (Month, Year):</label><br>
                <input type="month" id="startDate" name="startDate" required><br><br>
                <label for="endDate">End Date (Month, Year):</label><br>
                <input type="month" id="endDate" name="endDate"><br><br>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" required></textarea><br><br>
                <input type="submit" value="Save">
                <button class="cancel-profile-edit" onclick="closeWorkExperienceModal()">Cancel</button>
            </form>
            
            <!-- Display entered data -->
            <div id="workExperienceDisplay" style="display: none;">
                <h3>Entered Work Experience:</h3>
                <p><strong>Name of Institution:</strong> <span id="displayInstitution"></span></p>
                <p><strong>Role/Job Title:</strong> <span id="displayRole"></span></p>
                <p><strong>Start Date:</strong> <span id="displayStartDate"></span></p>
                <p><strong>End Date:</strong> <span id="displayEndDate"></span></p>
                <p><strong>Description:</strong> <span id="displayDescription"></span></p>
            </div>
        </div>
    </div>

<!-- Education Modal -->
<div id="educationModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closeEducationModal()">&times;</span>
        <h2>Add Education</h2>
        <!-- Form to add education details -->
        <form id="educationForm" onsubmit="addEducation(event)">
            <label for="institution">Name of Institution:</label><br>
            <input type="text" id="institution" name="institution" required><br><br>
            <label for="degree">Degree:</label><br>
            <input type="text" id="degree" name="degree" required><br><br>
            <label for="startDate">Start Date:</label><br>
            <input type="date" id="startDate" name="startDate" required><br><br>
            <label for="endDate">End Date:</label><br>
            <input type="date" id="endDate" name="endDate"><br><br>
            <input type="checkbox" id="currentlyStudying" name="currentlyStudying">
            <label for="currentlyStudying">I currently study here</label><br><br>
            <input type="submit" value="Save">
            <button class="cancel-profile-edit" onclick="closeEducationModal()">Cancel</button>
        </form>
        
        <!-- Display entered education data -->
        <div id="educationDisplay" style="display: none;">
            <h3>Entered Education:</h3>
            <p><strong>Name of Institution:</strong> <span id="displayInstitution"></span></p>
            <p><strong>Degree:</strong> <span id="displayDegree"></span></p>
            <p><strong>Start Date:</strong> <span id="displayStartDate"></span></p>
            <p><strong>End Date:</strong> <span id="displayEndDate"></span></p>
            <p><strong>Currently Studying:</strong> <span id="displayCurrentlyStudying"></span></p>
        </div>
    </div>
</div>



    <script>
        function toggleEditForm() {
            var editForm = document.querySelector('.edit-form');
            var editProfileLink = document.querySelector('.edit-profile-link');

            if (editForm.style.display !== 'block') {
                // Show edit form and hide profile details
                editForm.style.display = 'block';
                editProfileLink.style.display = 'none';
            } else {
                // Hide edit form and show profile details
                editForm.style.display = 'none';
                editProfileLink.style.display = 'inline-block';
            }
        }

        // Update profile picture
        function changeProfilePicture(event) {
            var profileImg = document.getElementById('profileImg');
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                profileImg.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }

        // Function to open the project modal
        function openProjectModal() {
            document.getElementById('projectModal').style.display = 'block';
        }

        // Function to close the project modal
        function closeProjectModal() {
            document.getElementById('projectModal').style.display = 'none';
        }

        // Function to open the work experience modal
        function openWorkExperienceModal() {
            document.getElementById('workExperienceModal').style.display = 'block';
        }

        // Function to close the work experience modal
        function closeWorkExperienceModal() {
            document.getElementById('workExperienceModal').style.display = 'none';
        }

        // Function to open the education modal
        function openEducationModal() {
            document.getElementById('educationModal').style.display = 'block';
        }

        // Function to close the education modal
        function closeEducationModal() {
            document.getElementById('educationModal').style.display = 'none';
        }

        // Function to add work experience
        function addWorkExperience(event) {
            event.preventDefault();
            
            // Get form values
            var institution = document.getElementById('institution').value;
            var role = document.getElementById('role').value;
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;
            var description = document.getElementById('description').value;

            // Display entered data
            document.getElementById('displayInstitution').textContent = institution;
            document.getElementById('displayRole').textContent = role;
            document.getElementById('displayStartDate').textContent = startDate;
            document.getElementById('displayEndDate').textContent = endDate;
            document.getElementById('displayDescription').textContent = description;

            // Show the displayed data
            document.getElementById('workExperienceDisplay').style.display = 'block';
        }

        // Function to add education
        function addEducation(event) {
            event.preventDefault();
            
            // Get form values
            var institution = document.getElementById('institution').value;

            // You can handle adding education data here, such as appending it to the DOM or sending it to the server
            alert('Education added: ' + institution);

            // Close the education modal
            closeEducationModal();
        }
    </script>
</body>
</html>
