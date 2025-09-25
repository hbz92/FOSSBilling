{literal}
<style>
	#ispapiwhoisprivacy a {
		text-decoration: underline;
	}
    #ispapiwhoisprivacy p.descr {
        text-align: justify;
    }
</style>
{/literal}

<div class="card" id="ispapiwhoisprivacy">
    <div class="card-body">
        <h3 class="card-title">{$L::trans("hxcacontactconfirmation")} - {$domain}</h3>

        {if $error}
            <div class="alert alert-danger text-center">
                <p>{$status["error"]}</p>
            </div><br/>
        {else}        
            <p class="descr">{$L::trans("hxcacontactconfirmationdescr")}</p>
            <br/><b>ID:</b> {$status["data"]["X-CA-CONTACT-REGISTRANT"][0]}
        {/if}
    </div>
</div>