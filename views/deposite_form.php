<?php if(isset($successful)): ?>
    <div class="error_msg" style="color: green;"><?= $successful ?></div>
<?php endif ?>
<form action="deposite.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="amount" placeholder="Amount" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Deposite Funds
            </button>
        </div>
    </fieldset>
</form>