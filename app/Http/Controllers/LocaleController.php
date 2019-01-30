<?php


namespace ReactorCMS\Http\Controllers;


use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{

    /**
     * Sets locale
     *
     * @param string $locale
     * @return Response
     */
    public function setLocale($locale)
    {
        $this->setLocaleSession($locale);

        return redirect()->back();
    }

    /**
     * Sets locale
     *
     * @param string $locale
     * @return Response
     */
    public function setLocaleAndRedirectHome($locale)
    {
        $this->setLocaleSession($locale);

        return redirect()->route('site.home');
    }

    /**
     * Sets the locale
     *
     * @param string $locale
     */
    protected function setLocaleSession($locale)
    {
        if (in_array($locale, locales())) {
            Session::put('_locale', $locale);
        }
    }

}