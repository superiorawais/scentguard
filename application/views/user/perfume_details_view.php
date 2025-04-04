<div class="container mt-4">
<div class="row">
<div class="row">
    <!-- Perfume Image -->
    <div class="col-md-6">
        <img src="<?= base_url('uploads/perfume/' . $perfume['Image']) ?>" 
             alt="<?= htmlspecialchars($perfume['Name']) ?>" 
             class="img-fluid rounded">
    </div>
    
    <!-- Perfume Details -->
    <div class="col-md-6">
        <h2><?= htmlspecialchars($perfume['Name']) ?></h2>
        
        <div class="mb-3">
            <h5>Ingredients</h5>
            <p><?= $perfume['Ingredients'] ?: 'N/A' ?></p>
        </div>
        
        <div class="mb-3">
            <h5>All Risks</h5>
            <p><?= $perfume['DiseaseRisks'] ?: 'None' ?></p>
        </div>
        
        <!-- Only show personalized analysis if user has risks -->
        <?php if (!empty($this->session->userdata('user_risks'))) { ?>
            <div class="risk-analysis mb-3 p-3 bg-light rounded">
                <h5>Your Personal Risk Analysis</h5>
                
                <!-- Danger Risks -->
                <?php if (!empty($perfume['DangerRisks'])): ?>
                    <div class="danger-risks mb-2">
                        <h6>Risks That Affect You:</h6>
                        <?php foreach ($perfume['DangerRisks'] as $risk): ?>
                            <span class="badge bg-danger text-white me-1 mb-1"><?= htmlspecialchars($risk) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Safe Risks -->
                <?php if (!empty($perfume['SafeRisks'])): ?>
                    <div class="safe-risks mb-2">
                        <h6>Other Identified Risks:</h6>
                        <?php foreach ($perfume['SafeRisks'] as $risk): ?>
                            <span class="badge bg-success text-white me-1 mb-1"><?= htmlspecialchars($risk) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Safety Rating -->
                <div class="safety-rating mt-3">
                    <h6>Safety Rating:</h6>
                    <div class="progress mb-2" style="height: 25px;">
                        <div class="progress-bar safe-bg" 
                             role="progressbar" 
                             style="width: <?= $perfume['SafePercentage'] ?>%">
                            <?= $perfume['SafePercentage'] ?>% Safe
                        </div>
                        <div class="progress-bar danger-bg" 
                             role="progressbar" 
                             style="width: <?= $perfume['DangerPercentage'] ?>%">
                            <?= $perfume['DangerPercentage'] ?>% Risk
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        
        <!-- Alternatives -->
        <div class="mb-3">
            <h5>Alternatives</h5>
            <p><?= $perfume['AlternativeNames'] ?: 'No alternatives available' ?></p>
        </div>
    </div>
</div>


    <div class="col-6">
    <!-- Overall Rating Section -->
    <h3>Overall Rating</h3>
    <p id="averageRating">Loading...</p>

    <h3>Rate this Perfume</h3>
    <div class="row">
        <div class="col-6">
    <select id="perfumeRating" class="form-control">
        <option value="1">1 ⭐</option>
        <option value="2">2 ⭐⭐</option>
        <option value="3">3 ⭐⭐⭐</option>
        <option value="4">4 ⭐⭐⭐⭐</option>
        <option value="5">5 ⭐⭐⭐⭐⭐</option>
    </select>
    </div>
    <div class="col-6">
    <button class="btn bg-darkbrown" id="submitRating">Submit Rating</button>
    </div>
    </div>
    </div>
    </div>
    <h3 class="mt-4">Leave a Comment</h3>
    <textarea id="commentText" class="form-control" rows="3"></textarea>
    <button class="btn btn-success mt-2 bg-darkbrown" id="submitComment">Submit Comment</button>

    <h3 class="mt-4">User Comments</h3>
    <div id="commentsSection"></div>
</div>


<script>
    
$(document).ready(function () {
    let perfumeID = <?=$perfume['PerfumeID']?>;
    let isLoggedIn = <?= isset($_SESSION['userId']) ? 'true' : 'false' ?>; // Check login status

    loadComments();
    loadAverageRating();  // Load average rating when page loads

    // Submit Rating
    $("#submitRating").click(function () {
        if (!isLoggedIn) {
            showAlert("You must be logged in to submit a rating!", "Danger");
            return;
        }

        let rating = $("#perfumeRating").val();
        $.post("<?= base_url('perfume/submit_rating') ?>", { perfumeID: perfumeID, rating: rating }, function () {
            showAlert("Rating Submitted", "Success");
            loadAverageRating();  // Refresh rating after submission
        });
    });

    // Submit Comment
    $("#submitComment").click(function () {
        if (!isLoggedIn) {
            showAlert("You must be logged in to submit a comment!", "Danger");
            return;
        }

        let commentText = $("#commentText").val();
        if (commentText.trim() === '') {
            showAlert("Comment cannot be empty!", "Danger");
            return;
        }

        $.post("<?= base_url('perfume/submit_comment') ?>", { perfumeID: perfumeID, comment: commentText }, function () {
            showAlert("Comment submitted!", "Success");
            $("#commentText").val(""); // Clear textarea
            loadComments();
        });
    });

    // Load Comments
    function loadComments() {
        $.get("<?= base_url('perfume/get_comments') ?>/" + perfumeID, function (data) {
            $("#commentsSection").html(data);
        });
    }

    // Load Average Rating
    function loadAverageRating() {
        $.get("<?= base_url('perfume/get_average_rating') ?>/" + perfumeID, function (data) {
            $("#averageRating").html("Average Rating: " + data + " ⭐");
        });
    }

    function showAlert(msg, type) {
        let alertBox = $('#alert' + type);
        alertBox.text(msg).fadeIn(); // Set message and show alert
        
        setTimeout(function() {
            alertBox.fadeOut(); // Hide alert after 1.5 seconds
        }, 1500);
    }
});
</script>
