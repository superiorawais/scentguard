<section class="container-fluid bg-white">
  <div class="row align-items-center">
    <div class="col-9">
      <input type="text" class="form-control" id="searchBox" placeholder="Search for perfumes..."/>
    </div>
    <div class="col-3">
    <input type="button" class="form-control bg-darkbrown" value="Search" />
    </div>
  </div>

</section>


<section class="section register d-flex flex-column align-items-center justify-content-center py-4" >
<div class="container">
  <div class="row justify-content-center" id="searchResults">


  </div>
</div>

      </section>

<section class="section register d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <h1>Popular Perfumes</h1>
          <div class="row justify-content-center">
   
              <div class="col-lg-4">
<!-- Default Card -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Default Card</h5>
    Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti inventore consequatur nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos officiis expedita. Consequatur sint repellendus voluptas.
    Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum dolor nulla quia ut.
    Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum in.
  </div>
</div><!-- End Default Card -->
<!-- Card with header and footer -->
</div>
<div class="col-lg-4">
<!-- Default Card -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Default Card</h5>
    Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti inventore consequatur nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos officiis expedita. Consequatur sint repellendus voluptas.
    Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum dolor nulla quia ut.
    Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum in.
  </div>
</div><!-- End Default Card -->
<!-- Card with header and footer -->
</div>
<div class="col-lg-4">
<!-- Default Card -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Default Card</h5>
    Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti inventore consequatur nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos officiis expedita. Consequatur sint repellendus voluptas.
    Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum dolor nulla quia ut.
    Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum in.
  </div>
</div><!-- End Default Card -->
<!-- Card with header and footer -->
</div>

              </div>
            
        </div>

      </section>
      <script>

      $(document).ready(function() {

        var imgBaseUrl="<?=base_url('/uploads/perfume/')?>";
    $("#searchBox").on("keyup", function() {
        let query = $(this).val().trim();
        if (query.length < 2) return;

        $.ajax({
            url: "<?= base_url('perfume/search') ?>",
            type: "GET",
            data: { query: query },
            success: function(response) {
                let perfumes = JSON.parse(response);
                $("#searchResults").empty();
                
                if (perfumes.length === 0) {
                    $("#searchResults").append("<h1 class='text-center'>No results found.</h1>");
                    return;
                }

                perfumes.forEach(function(perfume) {
                    let cardHtml = `
                        <div class="col-lg-4 mb-3">
                            <div class="card">
                                <img src="${imgBaseUrl+'/'+perfume.Image}" class="card-img-top" alt="${perfume.Name}"/>
                                <div class="card-body">
                                    <h5 class="card-title">${perfume.Name}</h5>
                                    <p><strong>Ingredients:</strong> ${perfume.Ingredients || "N/A"}</p>
                                    <p><strong>Risks:</strong> ${perfume.DiseaseRisks || "None"}</p>
                                    <p><strong>Alternative:</strong> ${perfume.AlternativeNames || "No alternative available"}</p>
                                    <a href="perfume/details/${perfume.PerfumeID}" class="btn btn-primary bg-darkbrown mt-2">View Details</a>
                                </div>
                            </div>
                        </div>
                    `;
                    $("#searchResults").append(cardHtml);
                });
            },
            error: function() {
                $("#searchResults").html("<p class='text-danger'>Error fetching results.</p>");
            }
        });
    });
});
</script>