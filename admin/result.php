<div class="breadcrum">
    <p>Dashboard/<span>Result</span></p>
</div>
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Result of Test </h3>
        </div>
    </div>
    <div class="data-display">
        <div class="search">
            <input type="text" placeholder="&#x1F50D; search" name="search" class="search" id="search">
        </div>
        <div class="table-container">
            <table id="result-table">
                <!-- displaying all test result -->
            </table>
        </div>
        <div class="pagination">
            <div class="total-list">
                <p>Showing 1 to 10 of 50 entries</p>
            </div>
            <div class="page-btn">
                <button class="previous">Previous</button>
                <button class="next">Next</button>
            </div>
        </div>
    </div>
</div>
<script>
    <?php include 'js/result.js'; ?>
</script>