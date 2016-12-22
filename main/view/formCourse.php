<div class="control-group <?php echo !empty($courseValidator->getNameError()) ? 'error' : ''; ?>">
    <label class="control-label">Name</label>
    <div class="controls">
        <input style="width: 200px;" name="name" type="text" placeholder="Name"
               value="<?php echo !empty($course->getName()) ? $course->getName() : ''; ?>">
        <?php if (!empty($courseValidator->getNameError())): ?>
            <span class="help-inline"><?php echo $courseValidator->getNameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($courseValidator->getExpirationDateError()) ? 'error' : ''; ?>">
    <label class="control-label">Expiration date</label>
    <div class="controls">
        <input style="width: 200px;" name="expirationDate" type="date" placeholder="Expiration Date"
               value="<?php echo !empty($course->getExpirationDate()) ? $course->getExpirationDate() : ''; ?>">
        <?php if (!empty($courseValidator->getExpirationDateError())): ?>
            <span class="help-inline"><?php echo $courseValidator->getExpirationDateError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($courseValidator->getShortDescriptionError()) ? 'error' : ''; ?>">
    <label class="control-label">Short Description</label>
    <div class="controls">
        <input style="width: 200px;" name="shortDescription" type="text" placeholder="Short Description"
               value="<?php echo !empty($course->getShortDescription()) ? $course->getShortDescription() : ''; ?>">
        <?php if (!empty($courseValidator->getShortDescriptionError())): ?>
            <span class="help-inline"><?php echo $courseValidator->getShortDescriptionError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($courseValidator->getDescriptionError()) ? 'error' : ''; ?>">
    <label class="control-label">Description</label>
    <div class="controls">
        <textarea rows="5" cols="50" name="description"
                  placeholder="Description"><?php echo !empty($course->getDescription()) ? $course->getDescription() : ''; ?></textarea>
        <?php if (!empty($courseValidator->getDescriptionError())): ?>
            <span class="help-inline"><?php echo $courseValidator->getDescriptionError(); ?></span>
        <?php endif; ?>
    </div>
</div>