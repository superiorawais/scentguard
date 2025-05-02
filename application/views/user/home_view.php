<section class="container-fluid" >
  <div class="row align-items-center justify-content-center">
    <div class="col-12">
      <h1 class="text-center txt-darkbrown">Choose Perfume Safely</h1>
      <!-- <p class="text-center txt-darkbrown">Discover fragrances suited for you by comparing <br> perfume ingredients to personal risk factors.</p> -->
    </div>
    <div class="col-6">
      <div class="input-group input-group-lg">
        <input type="text" class="form-control"  placeholder="Components,Perfume Name" id="searchBox" aria-label="Search" aria-describedby="searchText">
        <span class="input-group-text bg-darkbrown" id="searchBtn">Search</span>
      </div>
    </div>
    <!-- <div class="col-9">
      <input type="text" class="form-control" id="searchBox" placeholder="Search for perfumes..."/>
    </div>
    <div class="col-3">
    <input type="button" class="form-control bg-darkbrown" value="Search" />
    </div> -->
  </div>

</section>


<section class="section register d-flex flex-column align-items-center justify-content-center py-4" style="min-height: 600px;" >
<div class="container">
  <div class="row justify-content-center" id="searchResults">


  </div>
</div>

      </section>


      <script>

$(document).ready(function() {
    var imgBaseUrl = "<?=base_url('/uploads/perfume/')?>";
    
    $("#searchBox").on("keyup", function() {
        let query = $(this).val().trim();
        
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
                    // Risk section (only show if user has risks)
                    const riskContent = perfume.hasUserRisks ? `
                        <div class="risk-section">
                            ${perfume.DangerRisks && perfume.DangerRisks.length > 0 ? `
                                <div class="danger-risks">
                                    <strong>Potential Risks:</strong>
                                    ${perfume.DangerRisks.map(risk => 
                                        `<span class="badge bg-danger text-white me-1 mb-1">${risk}</span>`
                                    ).join('')}
                                </div>
                            ` : ''}
                            
                            <div class="mt-2">
                                <strong>Safety Rating:</strong>
                                <span class="text-success">${perfume.SafePercentage}% Safe</span>
                            </div>
                            
                            <div style="width:250px">
                                <canvas id="chart-${perfume.PerfumeID}" width="150" height="150"></canvas>
                            </div>
                        </div>
                    ` : '';

                    // Hide alternatives if 100% safe
                    const alternativeHtml = perfume.SafePercentage === 100 ? '' : 
                        `<p><strong>Alternative:</strong> ${perfume.AlternativeNames || "None"}</p>`;

                    // Build card HTML
                    let cardHtml = `
                        <div class="col-lg-4 mb-3">
                            <div class="card">
                                <img src="${imgBaseUrl + '/' + perfume.Image}" class="card-img-top" alt="${perfume.Name}"/>
                                <div class="card-body">
                                    <h5 class="card-title">${perfume.Name}</h5>
                                    <p><strong>Components:</strong> ${perfume.Ingredients || "N/A"}</p>
                                    <p><strong>All Risks:</strong> ${perfume.DiseaseRisks || "None"}</p>
                                    
                                    ${riskContent}
                                    
                                    ${alternativeHtml}
                                    
                                    <a href="perfume/details/${perfume.PerfumeID}" class="btn bg-darkbrown mt-2">View Details</a>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    $("#searchResults").append(cardHtml);

                    // Render chart only if user has risks
                    if (perfume.hasUserRisks) {
                        setTimeout(() => {
                            const ctx = document.getElementById(`chart-${perfume.PerfumeID}`).getContext('2d');
                            new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ['Safe', 'Risky'],
                                    datasets: [{
                                        data: [perfume.SafePercentage, perfume.DangerPercentage],
                                        backgroundColor: ['#A2EDA7', '#FFC3CE']
                                    }]
                                }
                            });
                        }, 100);
                    }
                });
            },
            error: function() {
                $("#searchResults").html("<p class='text-danger'>Error fetching results.</p>");
            }
        });
    });
});
</script>