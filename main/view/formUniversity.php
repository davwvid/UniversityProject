<div class="control-group <?php echo !empty($universityValidator->getNameError()) ? 'error' : ''; ?>">
    <label class="control-label">Name</label>
    <div class="controls">
        <input name="name" type="text" placeholder="Name"
               value="<?php echo !empty($university->getName()) ? $university->getName() : ''; ?>">
        <?php if (!empty($universityValidator->getNameError())): ?>
            <span class="help-inline"><?php echo $universityValidator->getNameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($universityValidator->getLinkError()) ? 'error' : ''; ?>">
    <label class="control-label">Link</label>
    <div class="controls">
        <input name="link" type="text" placeholder="Link"
               value="<?php echo !empty($university->getLink()) ? $university->getLink() : ''; ?>">
        <?php if (!empty($universityValidator->getLinkError())): ?>
            <span class="help-inline"><?php echo $universityValidator->getLinkError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($universityValidator->getDescriptionError()) ? 'error' : ''; ?>">
    <label class="control-label">Description</label>
    <div class="controls">
        <input name="description" type="text" placeholder="Description"
               value="<?php echo !empty($university->getDescription()) ? $university->getDescription() : ''; ?>">
        <?php if (!empty($universityValidator->getDescriptionError())): ?>
            <span class="help-inline"><?php echo $universityValidator->getDescriptionError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($universityValidator->getEmailError()) ? 'error' : ''; ?>">
    <label class="control-label">Email</label>
    <div class="controls">
        <input name="email" type="text" placeholder="Email"
               value="<?php echo !empty($university->getEmail()) ? $university->getEmail() : ''; ?>">
        <?php if (!empty($universityValidator->getEmailError())): ?>
            <span class="help-inline"><?php echo $universityValidator->getEmailError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($universityValidator->getFkPricePackageError()) ? 'error' : ''; ?>">
    <label class="control-label">Price Package</label>
    <div class="controls">
        <input name="pricePackage" type="number" placeholder="0, 1 or 2"
               value="<?php echo !empty($university->getFkPricePackage()) ? $university->getFkPricePackage() : ''; ?>">
        <?php if (!empty($universityValidator->getFkPricePackageError())): ?>
            <span class="help-inline"><?php echo $universityValidator->getFkPricePackageError(); ?></span>
        <?php endif; ?>
    </div>
</div>

<input hidden name="password"
       value="<?php echo !empty($university->getPassword()) ? $university->getPassword() : ''; ?>">