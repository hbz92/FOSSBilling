# CNIC Theme for WHMCS

The stock template from WHMCS for managing DNS records does not provide all the required functionality.
For this reason, we supply two child templates based on the templates shipped by WHMCS.

## Considerations on child templates
Child templates are useful as they make sure that if you update the parent template, the templates contained in the child template still prevail.
This is especially true if you are using the twenty-one or six templates shipped by WHMCS.
If you are using your own custom template, you might just copy the .tpl files to your own template.

With this now out of our way, let's consider the various installation options ;)

## Installation options

### You are using the Twenty-One theme in WHMCS
Upload *cnic-twenty-one* and configure WHMCS to use this instead.

### You are using the Six theme in WHMCS
Upload *cnic-six* and configure WHMCS to use this instead.

### Your template is based on either WHMCS Six or Twenty-One

#### Option 1
Alter the *theme.yaml* of this template to use your template as parent, then configure WHMCS to use this template.

#### Option 2
Copy the **.tpl* files contained in this template to your template, overwriting existing files.
If you made any customizations to those files, of course you would have to carry them over manually.

### You are using another kind of template
In this case you can still consider option 1 or 2 described above.
However, you might have to adapt the tpl file we supply to match your template design.
In general, we recommend using our *cnic-twenty-one* template as it is the more modern variant.
