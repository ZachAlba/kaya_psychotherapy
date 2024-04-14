<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>
    <span class="error"><?php echo $nameErr; ?></span><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>
    <span class="error"><?php echo $emailErr; ?></span><br>
    
    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" value="<?php echo $age; ?>" required><br>
    <span class="error"><?php echo $ageErr; ?></span><br>
    
    <label for="insurance">Insurance:</label><br>
    <select id="insurance" name="insurance" required>
        <option value="" disabled <?php if(empty($insurance)) echo 'selected'; ?>>Select an option</option>
        <option value="Optum" <?php if($insurance == "Optum") echo 'selected'; ?>>Optum</option>
        <option value="Allways" <?php if($insurance == "Allways") echo 'selected'; ?>>Allways</option>
        <option value="United Healthcare" <?php if($insurance == "United Healthcare") echo 'selected'; ?>>United Healthcare</option>
        <option value="Aetna" <?php if($insurance == "Aetna") echo 'selected'; ?>>Aetna</option>
        <option value="Private Pay" <?php if($insurance == "Private Pay") echo 'selected'; ?>>Private Pay</option>
    </select><br>
    <span class="error"><?php echo $insuranceErr; ?></span><br>
    
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required><?php echo $message; ?></textarea><br>
    <span class="error"><?php echo $messageErr; ?></span><br>
    
    <input type="submit" value="Submit">
</form>

