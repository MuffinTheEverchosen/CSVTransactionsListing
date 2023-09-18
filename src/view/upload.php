<main class="container-fluid my-4">
    <div class="row align-items-start">
        <form class="col-4 px-4" method="post" action="/submittedFile" enctype="multipart/form-data">
            <h5 class="text-center">Upload your .csv file</h5>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="csv_file" name="csv_file">
                <label class="input-group-text" for="csv.file">Upload</label>
            </div>
            <button type="submit" class="btn btn-success col-3 me-4">Submit</button>
        </form>
        <div class="col-8 px-4">
            <h5 class="text-center">Example of .csv file layout</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Check #</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>01/04/2021</td>
                    <td>77777</td>
                    <td>Bounty Income</td>
                    <td>$150.43</td>
                </tr>
                <tr>
                    <td>01/05/2021</td>
                    <td></td>
                    <td>Monthly Income</td>
                    <td>$700.25</td>
                </tr>
                <tr>
                    <td>01/06/2021</td>
                    <td>15671</td>
                    <td>household appliances purchase</td>
                    <td>-$1,303.97</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row align-items-start my-3">
        <ul class="list-group list-group-flush col-4 px-4">
            <li class="list-group-item">Date Should be in DD/MM/YYYY format.</li>
            <li class="list-group-item">5-digit check number of transaction.</li>
            <li class="list-group-item">Description shouldn't be longer than 255 chars.</li>
            <li class="list-group-item">Amount should be positive or negative number, all transactions are in american dollar, and you may but doesn't have to put $ sign at beginning of amount.</li>
        </ul>
        <div class="col-8 px-4">
            <h5 class="text-center">Upload single row of data</h5>
            <form method="post" action="/submittedRow">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col"><label for="date" class="form-label">Date</label></th>
                        <th scope="col"><label for="check" class="form-label">Check #</label></th>
                        <th scope="col"><label for="description" class="form-label">Description</label></th>
                        <th scope="col"><label for="amount" class="form-label">Amount</label></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="date" name="date">
                        </td>
                        <td><input type="text" class="form-control" id="check" name="check"></td>
                        <td><input type="text" class="form-control" id="description" name="description"></td>
                        <td><input type="text" class="form-control" id="amount" name="amount"></td>
                    </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success col-3 me-4">Submit</button>
                <a class="btn btn-danger col-3 me-4" href="/upload">Clear</a>
            </form>
        </div>
    </div>
    <a class="btn btn-outline-primary col-3 my-5" href="/">Back to menu</a>
</main>
