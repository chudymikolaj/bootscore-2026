<?php

function CertificationAudit($arrCertificationAudit)
{
  $getHeader = $arrCertificationAudit['header'];
  $getAuditSteps = $arrCertificationAudit['auditSteps'];
  $getAuditFinalDescription = $arrCertificationAudit['auditFinalDescription'];
  ?>
  <div class="CertificationAudit__container">
    <div class="container">
      <div class="CertificationAudit__container__header">
        <h2 class="CertificationAudit__container__header--title"><?= $getHeader['title']; ?></h2>
        <div class="CertificationAudit__container__header--description"><?= $getHeader['description']; ?></div>
      </div>

      <div class="CertificationAudit__container__auditSteps">
        <?php foreach ($getAuditSteps as $index => $auditStep): ?>
          <div class="CertificationAudit__container__auditStep">
            <div class="CertificationAudit__container__auditStep--index"><?= $index + 1; ?>.</div>
            <div class="CertificationAudit__container__auditStep--description">
              <p><b><?= $auditStep['bolded_text']; ?></b> <?= $auditStep['description']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if ($getAuditFinalDescription && !empty($getAuditFinalDescription)): ?>
        <div class="CertificationAudit__container__auditFinalDescription">
          <p><?= $getAuditFinalDescription; ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php
}

add_action('CertificationAudit', 'CertificationAudit', 10, 1);