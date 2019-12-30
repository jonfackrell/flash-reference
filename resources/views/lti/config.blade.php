<cartridge_basiclti_link xsi:schemaLocation="http://www.imsglobal.org/xsd/imslticc_v1p0 http://www.imsglobal.org/xsd/lti/ltiv1p0/imslticc_v1p0.xsd http://www.imsglobal.org/xsd/imsbasiclti_v1p0 http://www.imsglobal.org/xsd/lti/ltiv1p0/imsbasiclti_v1p0.xsd http://www.imsglobal.org/xsd/imslticm_v1p0 http://www.imsglobal.org/xsd/lti/ltiv1p0/imslticm_v1p0.xsd http://www.imsglobal.org/xsd/imslticp_v1p0 http://www.imsglobal.org/xsd/lti/ltiv1p0/imslticp_v1p0.xsd" xmlns="http://www.imsglobal.org/xsd/imslticc_v1p0" xmlns:blti="http://www.imsglobal.org/xsd/imsbasiclti_v1p0" xmlns:lticm="http://www.imsglobal.org/xsd/imslticm_v1p0" xmlns:lticp="http://www.imsglobal.org/xsd/imslticp_v1p0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <blti:title>Flash Reference</blti:title>
    <blti:description>Create custom flashcard decks for your students.</blti:description>
    <blti:icon>{{ env('APP_URL') }}img/flash-reference-lti-icon.png</blti:icon>
    <blti:launch_url>{{ env('APP_URL') }}lti/launch</blti:launch_url>
    <blti:extensions platform="canvas.instructure.com">
        <lticm:property name="tool_id">flash_reference_canvas</lticm:property>
        <lticm:property name="privacy_level">public</lticm:property>
        <lticm:property name="domain">flash-reference.com</lticm:property>
        <lticm:property name="icon_url">{{ env('APP_URL') }}img/flash.gif</lticm:property>
        <lticm:property name="selection_height">768</lticm:property>
        <lticm:property name="selection_width">1024</lticm:property>
        <lticm:options name="resource_selection">
            <lticm:property name="message_type">ContentItemSelectionRequest</lticm:property>
            <lticm:property name="url">{{ env('APP_URL') }}lti/launch</lticm:property>
            <lticm:property name="icon_url">{{ env('APP_URL') }}img/flash.gif</lticm:property>
            <lticm:property name="text">Flash Reference</lticm:property>
            <lticm:property name="selection_width">1024</lticm:property>
            <lticm:property name="selection_height">768</lticm:property>
            <lticm:property name="enabled">true</lticm:property>
        </lticm:options>
        <lticm:options name="editor_button">
            <lticm:property name="icon_url">{{ env('APP_URL') }}img/flash.gif</lticm:property>
            <lticm:property name="message_type">ContentItemSelectionRequest</lticm:property>
            <lticm:property name="text">Flash Reference</lticm:property>
            <lticm:property name="selection_width">1024</lticm:property>
            <lticm:property name="selection_height">768</lticm:property>
            <lticm:property name="url">{{ env('APP_URL') }}lti/launch</lticm:property>
        </lticm:options>
    </blti:extensions>
    <cartridge_bundle identifierref="BLTI001_Bundle"/>
    <cartridge_icon identifierref="BLTI001_Icon"/>
</cartridge_basiclti_link>
