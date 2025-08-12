<div class="row mb-5">
            <div class=" border-bottom">
            <div class="py-3 mb-0">
            <h2 class="text-center text-color-1">Donor  List</h2>
            <p class="mb-0 text-success text-center mb-2">&#x201C; Reach out to us anytime via our Contact Us page. We’re here to assist with your questions and needs. &#x201D;</p>
            </div>
            </div>
            <table class="srt">
                <thead>
                <tr>
                <th aria-sort="ascending">
                <button>SI.No<span aria-hidden="true"></span></button>
                </th>
                <th aria-sort="ascending">
                <button>Name<span aria-hidden="true"></span></button>
                </th>
                <th aria-sort="ascending">
                <button>Mobile No<span aria-hidden="true"></span></button>
                </th>
                <th aria-sort="ascending">
                <button>Email<span aria-hidden="true"></span></button>
                </th>
                <th class="num">
                <button>Amount<span aria-hidden="true"></span></button>
                </th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($doListMan)): ?>
                <?php foreach ($doListMan as $i => $dPayAmo): ?>
                <tr>
                <td><?php echo $i + 1; ?></td> 
                <td><?php echo htmlspecialchars($dPayAmo['name']); ?></td>
                <td><?php echo htmlspecialchars($dPayAmo['mobile_no']); ?></td>
                <td><?php echo htmlspecialchars($dPayAmo['email']); ?></td>
                <td class="num">₹ <?php echo number_format($dPayAmo['amount'], 2); ?></td>
                </tr>       
                <?php endforeach; ?>                
                <?php else: ?>
                <tr>
                <td colspan="5">No donations found.</td>
                </tr>               
                <?php endif; ?>
                </tbody>
                </table>   
                </div>