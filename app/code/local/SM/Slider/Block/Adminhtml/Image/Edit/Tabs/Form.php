<?php
/**
*
*/
class SM_Slider_Block_Adminhtml_Image_Edit_Tabs_Form
    extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        if (Mage::registry('image_data')) {
            $data = Mage::registry('image_data')->getData();
        } else {
            $data = array();
        }

        $form = new Varien_Data_Form();
        $this->setForm($form);

        $imageFieldset = $form->addFieldset('image_slider', array(
            'legend' => Mage::helper('sm_slider')->__('Slider Image')
            ));
        $imageFieldset->addField('path', 'image', array(
            'name' => 'path',
            'width' => '500',
            'height' => '100',
            'required' => true
            ));

        $fieldset = $form->addFieldset('image_form', array(
            'legend' => Mage::helper('sm_slider')->__('Slider Image Infomation')
            ));
        $fieldset->addField('name', 'text', array(
            'label' => Mage::helper('sm_slider')->__('Slider Image Name'),
            'class' => 'required-entity',
            'required' => true,
            'name' => 'name'
            ));

        $fieldset->addField('text', 'textarea', array(
            'label' => Mage::helper('sm_slider')->__('Text'),
            'class' => 'required-entity',
            'required' => true,
            'name' => 'text'
            ));
        $fieldset->addField('is_active', 'select', array(
            'label' => Mage::helper('sm_slider')->__('Active'),
            'class' => 'required-entity',
            'required' => true,
            'name' => 'is_active',
            'values' => array(
                0 => 'No',
                1 => 'Yes'
                ),
            ));
        $fieldset->addField('sort_order', 'text', array(
            'label' => Mage::helper('sm_slider')->__('Sort order'),
            'class' => 'required-entity  validate-number',
            'required' => true,
            'name' => 'sort_order',
            ));

        $fieldset->addField('slider_id', 'select', array(
            'label' => Mage::helper('sm_slider')->__('Select slider id'),
            'class' => 'required-entity',
            'required' => true,
            'name' => 'slider_id',
            'values' => Mage::getModel('sm_slider/slider')->getCollection()->toOptionArray()
            ));


        $form->setValues($data);
		return parent::_prepareForm();
	}


}
