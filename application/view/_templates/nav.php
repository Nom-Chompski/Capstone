    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>news">Home</a>
        <a href="<?php echo URL; ?>account">Account</a>
        <a href="<?php echo URL; ?>phagetool">Phage Data</a>
        <?php if($this->getAuth() >= 1){ echo '<a href="<?php echo URL; ?>dashboard">Dashboard</a>';} ?>
        <a href="<?php echo URL; ?>home/logout">Log Out</a>
    </div>
