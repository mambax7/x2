<?php
// Actualizado y convertido a UTF-8 Oswaldo Valladares xoopsdemo.tk
define('_MI_EXTGAL_NAME','Galer�a');
define('_MI_EXTGAL_DESC','Galer�a es un m�dulo para construir y gestionar galer�as de im�genes');

// Men� principal
define('_MI_EXTGALLERY_USERALBUM','Mi album');
define('_MI_EXTGALLERY_PUBLIC_UPLOAD','Subida p�blica');

// Men� principal de administraci�n
define('_MI_EXTGALLERY_INDEX','P�gina Principal');
define('_MI_EXTGALLERY_PUBLIC_CAT','Categor�a/Albumes');
define('_MI_EXTGALLERY_PHOTO','Fotos');
define('_MI_EXTGALLERY_PERMISSIONS','Permisos');
define('_MI_EXTGALLERY_WATERMARK_BORDER','Marca de agua y borde');
define('_MI_EXTGALLERY_SLIDESHOW','Presentaci�n de Diapositivas');
define('_MI_EXTGALLERY_EXTENSION','Extensi�n');
define('_MI_EXTGALLERY_ALBUM','Album');

// Opciones del m�dulo
define('_MI_EXTGAL_DISP_TYPE','Tipo de visualizaci�n');
define('_MI_EXTGAL_DISP_TYPE_DESC','Selecciona c�mo se visualizar� la foto');
define('_MI_EXTGAL_DISP_SET_ORDER','Tipo de �rden de visualizaci�n de foto');
define('_MI_EXTGAL_DISP_SET_ORDER_DESC','Selecione el tipo de orden de visualizaci�n de foto, desc o asc , basado en la hora y fecha de carga de la foto enviada');
define('_MI_EXTGALLERY_DESC','Desc');
define('_MI_EXTGALLERY_ASC','Asc');
define('_MI_EXTGAL_NB_COLUMN','N�mero de columnas en cada album');
define('_MI_EXTGAL_NB_COLUMN_DESC','Cu�ntas columnas para la vista de miniaturas');
define('_MI_EXTGAL_NB_LINE','N�mero de l�neas en el album');
define('_MI_EXTGAL_NB_LINE_DESC','Cu�ntas l�neas en la vista de miniaturas');
define('_MI_EXTGAL_SAVE_L','Guardar foto grande');
define('_MI_EXTGAL_SAVE_L_DESC','Si guarda fotos grandes - m�s grande que la configuraci�n media - el enlace de descarga apuntar� a este fichero en la vista de foto.');
define('_MI_EXTGAL_M_WIDTH','Ancho para foto media');
define('_MI_EXTGAL_M_WIDTH_DESC','La foto se redimensionar� para tener este ancho como m�ximo');
define('_MI_EXTGAL_M_HEIGTH','Alto para foto media');
define('_MI_EXTGAL_M_HEIGTH_DESC','La foto se redimensionar� para tener esta altura como m�ximo');
define('_MI_EXTGAL_T_WIDTH','Ancho de miniatura');
define('_MI_EXTGAL_T_WIDTH_DESC','Ancho m�ximo para la miniatura');
define('_MI_EXTGAL_T_HEIGTH','Alto de la miniatura');
define('_MI_EXTGAL_T_HEIGTH_DESC','Alto m�ximo de la miniatura');
define('_MI_EXTGAL_M_WATERMARK','Habilitar marca de agua para foto media');
define('_MI_EXTGAL_M_WATERMARK_DESC','Esta opci�n habilita la marca de agua para las fotos nuevas. Debe configurar antes la marca de agua en la pesta�a "Marca de Agua y Borde.');
define('_MI_EXTGAL_M_BORDER','Habilitar borde para foto media');
define('_MI_EXTGAL_M_BORDER_DESC','Esta opci�n habilita el borde para las fotos nuevas. Debe configurar antes el borde.');
define('_MI_EXTGAL_L_WATERMARK','Habilitar marca de agua para fotos grandes.');
define('_MI_EXTGAL_L_WATERMARK_DESC','Esta opci�n habilita la marca de agua para las nuevas fotos grandes. Debe configurar antes la marca de agua.');
define('_MI_EXTGAL_L_BORDER','Habilitar borde para fotos grandes.');
define('_MI_EXTGAL_L_BORDER_DESC','Esta opci�n habilita el borde para las nuevas fotos grandes. Debe configurar antes el borde.');
define('_MI_EXTGAL_NAME_PATTERN','Patr�n de descripci�n autom�tica de fotos');
define('_MI_EXTGAL_NAME_PATTERN_DESC','Si la foto no incluye descripci�n o ha sido subida en lote del lado del administrador, se usar� el nombre del archivo para hacer una descripci�n autom�tica.<br />Con una foto llamada \"Torneo-06-dic-2010_1.jpg\", obtendr� \"Torneo 06 dic 2010\" como descripci�n.');
define('_MI_EXTGAL_DISPLAY_EXTRA','Mostrar campo extra');
define('_MI_EXTGAL_DISPLAY_EXTRA_DESC','Permite a�adir m�s informaci�n al formulario de env�o. Por ejemplo, puede a�adir un bot�n de Paypal para cada foto.');
define('_MI_EXTGAL_ALLOW_HTML','Permitir HTML en el campo extra');
define('_MI_EXTGAL_ALLOW_HTML_DESC','Parmite, o no, HTML en la descripci�n y en informaci�n extra.');
define('_MI_EXTGAL_HIDDEN_FIELD','Esta constante se usa para eliminar avisos de PHP. Este texto no se usa en el m�dulo');
define('_MI_EXTGAL_SAVE_ORIG','Guardar foto original');
define('_MI_EXTGAL_SAVE_ORIG_DESC','Permite guardar la foto original antes de a�adirle marca de agua y borde si alguna de esas opciones est� habilitada para fotos grandes. La opci�n \"Grabar foto grande\" <b>debe estar habilitada</b> para usar esta opci�n.<br /><b>La versi�n original podr� ser descargada dependiendo de los permisos de grupo para \"Puede descargar las im�genes originales\".</b>.<br />Si un usuario no tiene permiso para descargar la original, se le entregar� la versi�n \"grande\".');
define('_MI_EXTGAL_ADM_NBPHOTO','Fotos por p�gina en el lado del administrador');
define('_MI_EXTGAL_ADM_NBPHOTO_DESC','N�mero de fotos que se mostrar�n en la tabla de aprobar y editar.');
define('_MI_EXTGAL_GRAPHLIB','Librer�a gr�fica');
define('_MI_EXTGAL_GRAPHLIB_DESC','Seleccione la librer�a gr�fica que desea usar. Tenga cuidado, esta es una opci�n avanzada, no la modifique si no sabe lo que est� haciendo.');
define('_MI_EXTGAL_GRAPHLIB_PATH','Ruta a la librer�a gr�fica');
define('_MI_EXTGAL_GRAPHLIB_PATH_DESC','Ruta a la librer�a gr�fica en el servidor <b>CON</b> barra al final.');
define('_MI_EXTGAL_ENABLE_RATING','Habilitar calificaci�n de fotos');
define('_MI_EXTGAL_ENABLE_RATING_DESC','Esta opci�n permite activar o desactivar globalmente la funci�n de calificaci�n.');
define('_MI_EXTGAL_DISP_PH_TITLE','T�tulo de foto');
define('_MI_EXTGAL_DISP_PH_TITLE_DESC','Esta opci�n permite elegir si uno quiere poner t�tulo a la foto, o no, en la vista de album.');
define('_MI_EXTGAL_DISP_CAT_IMG','Imagen de categor�a');
define('_MI_EXTGAL_DISP_CAT_IMG_DESC','Esta opci�n determina si se puede subir una imagen representativa de la categor�a.');
define('_MI_EXTGAL_M_QUALITY','Calidad de la foto media');
define('_MI_EXTGAL_M_QUALITY_DESC','Ajusta la calidad para la foto media donde 0 (mala) a 100 (buena)');
define('_MI_EXTGAL_T_QUALITY','Calidad de la miniatura');
define('_MI_EXTGAL_T_QUALITY_DESC','Ajusta la calidad para la foto media donde 0 (mala) a 100 (buena)');
//DNPROSSI - Double define to be removed
/* define('_MI_EXTGALLERY_ALBUM','Album'); */
define('_MI_EXTGAL_EXT_UPLOAD','P�gina de subida');
define('_MI_EXTGAL_EXT_UPLOAD_DESC','Seleccione el tipo de subida que tendr� el usuario. Extendida requiere un plugin de Java.');
define('_MI_EXTGALLERY_EXTENDED','Extendida');
define('_MI_EXTGALLERY_STANDARD','Est�ndar');

// Nombre del bloque
define('_MI_EXTGAL_B_PHOTO','Foto');
define('_MI_EXTGAL_B_SLIDESHOW','Presentaci�n de Diapositivas');
define('_MI_EXTGAL_B_SUB','Mayor Remitente');
define('_MI_EXTGAL_B_AJAX','Vista de Presentaci�n de Diapositivas');
// Notificaciones
define('_MI_EXTGAL_GLOBAL_NOTIFY','Notificaci�n global');
define('_MI_EXTGAL_GLOBAL_NOTIFYDSC','');
define('_MI_EXTGAL_ALBUM_NOTIFY','Notificaci�n de album');
define('_MI_EXTGAL_ALBUM_NOTIFYDSC','');
define('_MI_EXTGAL_PHOTO_NOTIFY','Notificaci�n de foto');
define('_MI_EXTGAL_PHOTO_NOTIFYDSC','');
define('_MI_EXTGAL_NEW_PHOTO_NOTIFY','Nueva foto');
define('_MI_EXTGAL_NEW_PHOTO_NOTIFYCAP','Notificarme cuando se a�ada una foto nueva');
define('_MI_EXTGAL_NEW_PHOTO_NOTIFYDSC','');
define('_MI_EXTGAL_NEW_PHOTO_NOTIFYSBJ','Envio de foto nueva');
define('_MI_EXTGAL_NEW_PHOTO_PENDING_NOTIFY','Notificarme cuando hay una foto nueva pendiente');
define('_MI_EXTGAL_NEW_PHOTO_PENDING_NOTIFYCAP','Notificarme cuando hay una foto nueva pendiente');
define('_MI_EXTGAL_NEW_PHOTO_PENDING_NOTIFYDSC','');
define('_MI_EXTGAL_NEW_PHOTO_PENDING_NOTIFYSBJ','Nueva foto pendiente');
define('_MI_EXTGAL_NEW_PHOTO_ALBUM_NOTIFY','Notificarme cuando se a�ada una nueva foto a este album');
define('_MI_EXTGAL_NEW_PHOTO_ALBUM_NOTIFYCAP','Notificarme cuando se a�ada una nueva foto a este album');
define('_MI_EXTGAL_NEW_PHOTO_ALBUM_NOTIFYDSC','');
define('_MI_EXTGAL_NEW_PHOTO_ALBUM_NOTIFYSBJ','Nueva foto enviada');
// DNPROSSI ADDED in ver 1.09
define('_MI_EXTGAL_FORM_OPTIONS','Formulario de Opciones');
define('_MI_EXTGAL_FORM_OPTIONS_DESC','Seleccione el editor a usar. Si tiene una instalaci�n "simple" (ejemplo:  utilizar solo el editor estandard, proporcionado en el paquete est�ndar del sistema), a continuaci�n, puede seleccionar DHTML y compacto');
define('_MI_EXTGAL_ENABLE_INFO','Ver Informaci�n de Foto');
define('_MI_EXTGAL_ENABLE_INFO_DESC','Si se desactiva toda la informaci�n de la foto (remitente, la resoluci�n, la fecha, etc) no podr�n ser vistos');
define('_MI_EXTGAL_ENABLE_ECARDS','Ver Postales');
define('_MI_EXTGAL_ENABLE_ECARDS_DESC','Habilita/deshabilita el �cono de Postal cuando <b>Ver Informaci�n de Foto</b> este habilitado');
define('_MI_EXTGAL_ENABLE_PHOTO_HITS','Ver N�mero de Visitas');
define('_MI_EXTGAL_ENABLE_PHOTO_HITS_DESC','Habilita/deshabilita ver el n�mero de visitas cuando <b>Ver Informaci�n de Foto</b> este habilitado');
define('_MI_EXTGAL_ENABLE_SUBMITTER_LNK','Ver Remitente');
define('_MI_EXTGAL_ENABLE_SUBMITTER_LNK_DESC','Habilita/deshabilita Ver remitente cuando <b>Ver Informaci�n de Foto</b> este habilitado');
define('_MI_EXTGAL_ENABLE_RESOLUTION','Ver Resoluci�n');
define('_MI_EXTGAL_ENABLE_RESOLUTION_DESC','Habilita/deshabilita Ver Resoluci�n cuando <b>Ver Informaci�n de Foto</b> este habilitado');
define('_MI_EXTGAL_ENABLE_DATE','Ver Fecha');
define('_MI_EXTGAL_ENABLE_DATE_DESC','Habilita/deshabilita Ver Fecha cuando <b>Ver Informaci�n de Foto</b> este habilitado');
define('_MI_EXTGAL_ENABLE_DOWNLOAD','Ver Descargas');
define('_MI_EXTGAL_ENABLE_DOWNLOAD_DESC','Habilita/deshabilita Descargar y Ver la Cantidad de Descargas cuando <b>Ver Informaci�n de Foto</b> este habilitado');
define('_MI_EXTGAL_ENABLE_SHOW_COMMENTS','Ver Comentarios');
define('_MI_EXTGAL_ENABLE_SHOW_COMMENTS_DESC','Habilita/deshabilita Ver la cantidad de Comentarios cuando <b>Ver Informaci�n de Foto</b> este habilitado');

define('_MI_EXTGAL_INFO_VIEW','Ver Info');
define('_MI_EXTGAL_INFO_VIEW_DESC','Muestra-oculta la info  de las miniaturas o fotos del �lbum');
define('_MI_EXTGAL_INFO_BOTH','Ambos');
define('_MI_EXTGAL_INFO_ALBUM','Album');
define('_MI_EXTGAL_INFO_PHOTO','Foto');
define('_MI_EXTGAL_INFO_PUBUSR','Publica o Info de Usuario');
define('_MI_EXTGAL_INFO_PUBUSR_DESC','Muestra-oculta la info del album p�blico o del usuario y foto');
define('_MI_EXTGAL_INFO_PUBLIC','P�blico');
define('_MI_EXTGAL_INFO_USER','Usuario');
define('_MI_EXTGAL_JQUERY',"Uso de jQuery");
define('_MI_EXTGAL_JQUERY_DESC',"Puede habilitar/deshabilitar jQuery en las plantillas del m�dulo. si jQuery es cargado en su tema y tiene problemas con efectos Ajax del theme (Interferencia de la librer�a jQuery),debe desactivar jQuery en extgallery y use el jQuery del tema.");

define('_MI_EXTGAL_SOCIAL',"Uso de Red Social");
define('_MI_EXTGAL_SOCIAL_DESC',"Puede usar Red Socal y el �cono de marcador para cada foto");

define('_MI_EXTGAL_NONE',"Ninguno");
define('_MI_EXTGAL_SOCIALNETWORM',"Redes Sociales");

define('_MI_EXTGAL_BOOKMARK',"M�rcame");
?>