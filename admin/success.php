
<?php
if($session->has('success')): ?>
<div class="alert alert-success">
<?= $session->get('success')?>
</div>

<?php endif  ; $session->remove('success')?>
