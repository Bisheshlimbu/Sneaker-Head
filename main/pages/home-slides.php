<?php
// session_start();
include_once('../../config/functions.php');
include_once('sidebar.php');


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

if (empty($user_id)) {
    header("Location: /main/pages/login.php");
    exit();
}

?>
<style>
    .main-container {
        display: flex;
        gap: 10px;
    }

    .banner-section {
        width: 50%;
        /* background-color:red; */
        border: 1px solid gray;
        border-radius: 10px;
        padding: 20px;
    }

    .highlight-section {
        width: 50%;
        /* background-color:green; */
        border: 1px solid gray;
        border-radius: 10px;
        padding: 20px;
    }

    .highlight-lists {
        padding: 5px;
        height: 500px;
        overflow-y: scroll;

        /* background-color:gray; */
        ul {
            display: flex;
            align-items: center;
            justify-content: space-between;
            list-style-type: none;
            margin-bottom: 10px;
            background-color: #3333;
            border-radius: 10px;
            padding: 5px 50px;
        }
    }

    .highlight-image {
        width: 150px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        overflow: hidden;

        img {
            object-fit: cover;
            width: 100%
        }
    }

    .highlight-btn-container {
        display: flex;
        align-items: center;
        justify-content: right;
    }

    .add-highlight-btn {
        padding: 10px;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .banner-button {
        padding: 10px;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 10px;
    }


    /* modal */

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        width: 500px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #;
    }

    .success-message {
        background-color: rgba(101, 221, 101, 0.463);
        color: white;
        border: 0.5px solid white;
        padding: 10px;
        margin-bottom: 10px;
        margin-top: 10px;
        border-radius: 10px;
    }

    .error-message {
        background-color: rgba(242, 90, 79, 0.463);
        color: white;
        border: 0.5px solid white;
        padding: 10px;
        margin-bottom: 10px;
        margin-top: 10px;
        border-radius: 10px;
    }

    input[type="checkbox"] {
        transform: scale(1.5);
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        margin-right: 20px;
    }
</style>


<main class="main-container">

    <div class="banner-section">
        <h1>Banner Image</h1>
        <div>
            <button class="banner-button">Change Banner</button>
            <div class="banner-image">
                <img src="data:image/jpeg;base64,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"
                    alt="banner image">
            </div>
            <!-- <div>
                <form id="banner-image-form">
                    

                </form>
            </div> -->
        </div>
    </div>

    <div class="highlight-section">
        <h1>Highlight Section</h1>
        <div>
            <div class="highlight-btn-container">
                <button class="add-highlight-btn" onclick="openModal()">Add Hightlights</button>
            </div>
            <p id="error_message_make_visible" style="color:red;"></p>
            <div class="highlight-lists" id="highlight-container">
                <?php
                $highlights = get_highlights();
                if (is_array($highlights) && !empty($highlights)) {
                    foreach ($highlights as $highlight) {
                        ?>
                        <ul>
                            <li>
                                <label class="highlight-card-checkbox">
                                    <input type="checkbox" class="highlight-box" name="highlight_ids[]"
                                        value="<?php echo $highlight['id']; ?>" <?php echo $highlight['status']==1?'checked':"";?>>
                                    <?php echo ucfirst($highlight['title']); ?>
                                </label>
                            </li>
                            <li class="highlight-image">
                                <img src="http://sneaker-head.local<?php echo $highlight['image']; ?>" alt="" />
                            </li>
                        </ul>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- add highlight modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add Hightlight Form</h2>
            <div class="" id="add_highlights_message"></div>
            <form id="popupForm">
                <div class="form-group">
                    <label for="name">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="email">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</main>


<script>
    function openModal() {
        document.getElementById('myModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    // window.onclick = function (event) {
    //     const modal = document.getElementById('myModal');
    //     if (event.target == modal) {
    //         closeModal();
    //     }
    // }
    $('#popupForm').on('submit', function (e) {

        e.preventDefault();

        var form = this;
        var formData = new FormData(form);
        formData.append('action', 'add_highlight');

        $.ajax({
            url: "http://sneaker-head.local/main/pages/ajax-request.php",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // console.log(response);

                if (response.status === "success") {
                    $("#add_highlights_message").html(response.message);
                    $("#add_highlights_message").removeClass("error-message");
                    $("#add_highlights_message").addClass("success-message");
                    setTimeout(function () {
                        $("#add_highlights_message").html("");
                        $("#add_highlights_message").removeClass("error-message");
                        $("#add_highlights_message").removeClass("success-message");
                        $(form)[0].reset();
                        $('#myModal').css('display', 'none');

                        // append the highlight 
                        $('#highlight-container').prepend(`
                        <ul>
                            <li>
                                <label class="highlight-card-checkbox">
                                    <input type="checkbox" class="highlight-box" name="highlight_ids[]" value="<?php echo $highlight['id']; ?>">
                                   ${response.title}
                                </label>
                            </li>
                            <li class="highlight-image">
                                <img src="http://sneaker-head.local${response.image}" alt="" />
                            </li>
                        </ul>
                            `)
                    }, 2000);

                } else {
                    $("#add_highlights_message").html(response.message);
                    $("#add_highlights_message").removeClass("success-message");
                    $("#add_highlights_message").addClass("error-message");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Upload failed:', textStatus, errorThrown);
            }
        });

    });


    //make it visible to frontend
    $(document).on('change', '.highlight-box', function () {
        const highlightId = $(this).val();
        const isChecked = $(this).is(':checked')?1:0;
        const message = isChecked ? 'Checkbox is checked!' : 'Checkbox is unchecked!';

        // Log the checkbox state to the console
        console.log(message);

        // Send AJAX request
        $.ajax({
            url: 'http://sneaker-head.local/main/pages/ajax-request.php',
            type: 'POST',
            dataType: 'json', // Expect JSON response
            data: {
                highlight_id: highlightId,
                checked: isChecked,
                action:'make_visible_frontend'
            },
            success: function (response) {
                if (response.status === 'success') {
                    console.log('Checkbox updated successfully');
                } else {
                    $('#error_message_make_visible').html(response.message);
                    // console.error('Failed to update:', response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    });
</script>