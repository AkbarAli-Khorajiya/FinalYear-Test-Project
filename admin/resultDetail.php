<div class="breadcrum">
    <p>Dashboard/Result/<span>Attempted Student</span></p>
</div>
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Attempted Students</h3>
        </div>
    </div>
    <div class="data-display">
        <div class="search">
            <input type="text" placeholder="&#x1F50D; search" name="search" class="search" id="search">
            <input type="text" hidden value=<?php echo $_GET['id']?> id="result_id">
        </div>
        <div class="table-container">
            <table cellspacing="10px" id="Attempted-table">

                <!-- ///// All Attempted Students ///// -->

            </table>
        </div>
        <div class="pagination" style="display: flex;justify-content: space-between;">
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
<?php include_once 'js/resultDetail.js'; ?>
</script>