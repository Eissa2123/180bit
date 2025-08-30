<?php
// نفس فكرة textField.php، لكن مع زر إظهار/إخفاء
function renderPasswordField(array $opt = [])
{
    $id    = $opt['id']    ?? ($opt['name'] ?? 'password');
    $name  = $opt['name']  ?? $id;
    $label = $opt['label'] ?? '';
    $ph    = $opt['placeholder'] ?? '';
    $req   = !empty($opt['required']) ? 'required' : '';
    $dir   = $opt['dir'] ?? 'auto';
    $error = $opt['error'] ?? '';

?>
    <div class="password-field" dir="<?= htmlspecialchars($dir) ?>">
        <?php if ($label): ?>
            <label class="c-field__label" for="<?= htmlspecialchars($id) ?>"><?= $label ?></label>
        <?php endif; ?>

        <!-- نستخدم نفس كلاس text field الموجود عندك -->
        <input
            class="text-field"
            id="<?= htmlspecialchars($id) ?>"
            type="password"
            name="<?= htmlspecialchars($name) ?>"
            placeholder="<?= htmlspecialchars($ph) ?>"
            <?= $req ?> />

        <button class="password-field__toggle" type="button" aria-label="Toggle password" onclick="
      const i=document.getElementById('<?= htmlspecialchars($id) ?>');
      if(i.type==='password'){ i.type='text'; this.textContent='🙈'; }
      else{ i.type='password'; this.textContent='👁'; }
    ">👁</button>

        <?php if ($error): ?>
            <div class="c-field__error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
    </div>
<?php
}
