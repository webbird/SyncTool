<?php

require SIA_VENDOR_PATH.'/wblib/wbForms.php';

\wblib\wbFormsElementForm::setClass('form-horizontal');
\wblib\wbFormsElement::setClass('form-control');

\wblib\wbFormsElementLabel::setTemplate(
    '<label class="col-sm-4 control-label"%for%%style%>%label%</label>'
);
\wblib\wbFormsElement::setTemplate(
    '<div class="form-group">
      %label%
      <div class="col-sm-1">%is_required%</div>
      <div class="col-sm-7">
        <input%type%%name%%id%%class%%style%%title%%value%%required%%placeholder%%data%%aria-required%%pattern%%tabindex%%accesskey%%disabled%%readonly%%onblur%%onchange%%onclick%%onfocus%%onselect% />
        <span class="help-block with-errors">%after%</span>
      </div>
    </div>'
);
\wblib\wbFormsElementSelect::setTemplate(
    '<div class="form-group">
	  %label%
      <div class="col-sm-1">%is_required%</div>
      <div class="col-sm-7">
        <select%name%%id%%class%%style%%title%%multiple%%tabindex%%accesskey%%disabled%%readonly%%data%%required%%aria-required%%onblur%%onchange%%onclick%%onfocus%%onselect%>%options%</select>
        <span class="help-block with-errors">%after%</span>
      </div>
    </div>'
);
\wblib\wbFormsElementCheckbox::setTemplate(
    '<div class="form-group">
      %label%
      <div class="col-sm-1">%is_required%</div>
      <div class="col-sm-7">
        <input%type%%name%%id%%class%%checked%%style%%title%%value%%required%%aria-required%%pattern%%data%%tabindex%%accesskey%%disabled%%readonly%%onblur%%onchange%%onclick%%onfocus%%onselect% />
        <span class="help-block with-errors">%after%</span>
      </div>
    </div>'
);
\wblib\wbFormsElementDivider::setTemplate(
    '<div class="row"><div class="col-md-12"><hr /></div></div>'
);
\wblib\wbFormsElementButton::setClass('btn btn-default');
\wblib\wbFormsElementSubmit::setClass('btn btn-primary');