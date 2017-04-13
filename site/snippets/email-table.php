<table>
   <thead>
      <tr>
         <th>Field</th>
         <th>Value</th>
      </tr>
   </thead>
   <tbody>
<?php
      foreach ($form as $field => $value):
         if (is_array($value)) {
            $value = implode(', ', array_filter($value, function ($i) {
               return $i !== '';
            }));
         }
?>
      <tr>
         <td colspan="2"><strong><?php echo "Email: {$form['_from']}"; ?></strong></td>
      </tr>
      <tr>
         <td><?php echo ucfirst($field) ?></td>
         <td><?php echo $value ?></td>
      </tr>
<?php endforeach; ?>
   </tbody>
</table>
