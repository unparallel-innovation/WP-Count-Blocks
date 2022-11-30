const { useBlockProps, InspectorControls, MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { ColorPalette, TextControl, PanelBody, IconButton } = wp.components;

export default function Edit( { attributes, setAttributes } ) {

	const { 
		image, title, endpoint, valueColor, titleColor
	} = attributes;

	const colors = wp.data.select('core/block-editor').getSettings().colors;

	function renderStatisticTitleTextBox(){
		return (
			<TextControl
			label="Title"
			value={ title }
			onChange={ ( title ) => setAttributes({title})}
		/>)
	}

	function renderIconImage(){
		if(image){
			return (
				<>
					<div style={{width: '75px', height: '75px', marginTop: '8px'}}>
						<img src={image} />
					</div>
				</>
			)
		}
		return '';
	}

	function onSelectImage(newImage){
		setAttributes({image: newImage.sizes.full.url});
	}

	return (<>
		<InspectorControls style={{marginBottom: '40px'}}>
			<PanelBody>
				<p><strong>Select an Icon Image</strong></p>
				<MediaUploadCheck>
					<MediaUpload 
						onSelect={onSelectImage}
						allowedTypes={ ['image'] }
						value={image}
						render={({open}) => (
							<>
								<IconButton onClick={open} icon="upload">Icon Image</IconButton>
								{renderIconImage()}
							</>
						)}
					/>
				</MediaUploadCheck>
			</PanelBody>	
			<PanelBody>
				<p><strong>Select Value Color</strong></p>
				<ColorPalette
					colors={ colors }
					value={ valueColor }
					onChange={ ( valueColor ) =>{setAttributes({valueColor})}}
				/>
			</PanelBody>
			<PanelBody>
				<p><strong>Select Title Color</strong></p>
				<ColorPalette
					colors={ colors }
					value={ titleColor }
					onChange={ ( titleColor ) =>{setAttributes({titleColor})}}
				/>
			</PanelBody>

			<PanelBody>
				<p><strong>Select Count Source</strong></p>
				<TextControl
					label="Endpoint"
					value={ endpoint }
					onChange={ ( endpoint ) => setAttributes({endpoint})}
				/>
			</PanelBody>
		</InspectorControls>
		
		<div { ...useBlockProps() }>
			<p >
				Statistic Card
			</p>
			{renderStatisticTitleTextBox()}
		</div>
		</>
	)
}