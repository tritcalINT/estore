<?php
sleep(2);
$step_number = $_REQUEST["step_number"];
echo '<div class="form-group">
        <label for="cc-number" class="control-label">Card number formatting <small class="text-muted">[<span class="cc-brand"></span>]</small></label>
        <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
      </div>

      <div class="form-group">
        <label for="cc-exp" class="control-label">Card expiry formatting</label>
        <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required>
      </div>

      <div class="form-group">
        <label for="cc-cvc" class="control-label">Card CVC formatting</label>
        <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required>
      </div>

      <div class="form-group">
        <label for="numeric" class="control-label">Restrict numeric</label>
        <input id="numeric" type="tel" class="input-lg form-control" data-numeric>
      </div>';
?>
