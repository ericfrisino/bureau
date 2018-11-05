<?php
/**
 * Created by PhpStorm.
 * User: holmes
 * Date: 2/15/17
 * Time: 11:32 AM
 */
?>

<? $icc_download_description = get_post_meta( get_the_ID(), 'icc-download-description', true ); ?>
<? $icc_download_link_us = get_post_meta( get_the_ID(), 'icc-download-link-us', true ); ?>
<? $icc_download_link_ca = get_post_meta( get_the_ID(), 'icc-download-link-ca', true ); ?>
<? $icc_download_link_fr = get_post_meta( get_the_ID(), 'icc-download-link-fr', true ); ?>


<tr>
	<td>
<!--		<a href="--><?// the_permalink(); ?><!--">--><?// the_title(); ?><!--</a>-->
		<span style="color: #000;"><? the_title(); ?></span>
		<? if( $icc_download_description ) { ?>
			<span class="download-description">&mdash; <?  echo $icc_download_description; ?></span>
		<? } ?>
	</td>
	<td style="text-align: center;">
		<? if( $icc_download_link_us ) { ?>
			<a href="<? echo $icc_download_link_us; ?>">&darr;</a>
		<? } else { ?>
			<span style="color:#CCC">&ndash;</span>
		<? } ?>
	</td>
	<td style="text-align: center;">
		<? if( $icc_download_link_ca ) { ?>
			<a href="<? echo $icc_download_link_ca; ?>">&darr;</a>
		<? } else { ?>
			<span style="color:#CCC">&ndash;</span>
		<? } ?>
	</td>
	<td style="text-align: center;">
		<? if( $icc_download_link_fr ) { ?>
			<a href="<? echo $icc_download_link_fr; ?>">&darr;</a>
		<? } else { ?>
			<span style="color:#CCC">&ndash;</span>
		<? } ?>
	</td>
</tr>
