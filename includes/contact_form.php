<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($formData['name']); ?>" required><br>
    <span class="error"><?php echo $errorMessages['name']; ?></span><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($formData['email']); ?>" required><br>
    <span class="error"><?php echo $errorMessages['email']; ?></span><br>
    
    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($formData['age']); ?>" required><br>
    <span class="error"><?php echo $errorMessages['age']; ?></span><br>
    
    <label for="insurance">Insurance:</label><br>
    <select id="insurance" name="insurance" required>
        <option value="" disabled <?php if(empty($formData['insurance'])) echo 'selected'; ?>>Select an option</option>
        <option value="Optum" <?php if($formData['insurance'] == "Optum") echo 'selected'; ?>>Optum</option>
        <option value="Allways" <?php if($formData['insurance'] == "Allways") echo 'selected'; ?>>Allways</option>
        <option value="United Healthcare" <?php if($formData['insurance'] == "United Healthcare") echo 'selected'; ?>>United Healthcare</option>
        <option value="Aetna" <?php if($formData['insurance'] == "Aetna") echo 'selected'; ?>>Aetna</option>
        <option value="Private Pay" <?php if($formData['insurance'] == "Private Pay") echo 'selected'; ?>>Private Pay</option>
    </select><br>
    <span class="error"><?php echo $errorMessages['insurance']; ?></span><br>
    
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required><?php echo htmlspecialchars($formData['message']); ?></textarea><br>
    <span class="error"><?php echo $errorMessages['message']; ?></span><br>
    
    <input type="checkbox" id="waiting_list" name="waiting_list">
    <label for="waiting_list">Add to waiting list</label><br>
    
    <input type="submit" value="Submit">
</form>
