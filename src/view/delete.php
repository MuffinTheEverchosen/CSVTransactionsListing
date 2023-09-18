<main>
    <form method="post" class="container-fluid row p-0" action="/deleted">
        <div class="col-9">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Check</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount in $</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php

                use classes\TransactionListing;

                $tbody = new TransactionListing();

                echo $tbody->listTransactions(true);
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <h5>On the left you can see all your transaction</h5>
            <div class="container-fluid text-center px-5">
                <a class="btn btn-danger col-12  my-2" href="/list">Delete Transactions</a>
                <button type="submit" class="btn btn-success col-12  my-2">Submit Deletion</button>
                <a class="btn btn-outline-primary col-12  my-2" href="/">Back to menu</a>
            </div>
        </div>
    </form>
</main>
