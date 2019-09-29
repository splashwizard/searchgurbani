<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Baanis extends My_Controller
	{
		function  __construct()
		{
			parent::__construct();
			$this->load->model('dao/baani_dao');
		}
		
		function index()
		{
			
		}
		
		function jaap_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count = 807;
			$limit        = 25;
			
			$current_page     = ($index / 25) + 1;
			$total_page       = 33;
			$first_page_index = 0;
			$total_page_index = 800;
			
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_jaap_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url'] = 'baanis/jaap-sahib';
			
			$page['baani_title']  = 'Jaap Sahib';
			$page['audio']        = 'jaap_sahib.mp3';
            $page['current_page'] = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Jaap Sahib with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page

			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
            {
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
			
		}
		
		function tvai_prasadh_savaiye($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 40;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 2;
			$first_page_index = 0;
			$total_page_index = 25;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_tvai_prasadh_savaiye($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url'] = 'baanis/tvai-prasadh-savaiye';
			
			
			$page['baani_title']  = 'Tvai Prasadh Savaiye';
			$page['audio']        = 'tvai_prasadh_savaiye.mp3';
			$page['current_page'] = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Tvai Prasadh Savaiye with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
			
		}
		
		//Chaupai Sahib
		
		function chaupai_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 121;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 5;
			$first_page_index = 0;
			$total_page_index = 100;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_chaupai_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/chaupai-sahib';
			
			$page['baani_title']      = 'Chaupai Sahib';
			$page['audio']            = 'chaupai_sahib.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Chaupai Sahib with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Kirtan Sohila
		function kirtan_sohila($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 56;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 3;
			$first_page_index = 0;
			$total_page_index = 50;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_kirtan_sohila($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			$page['base_url']         = 'baanis/kirtan-sohila';
			$page['baani_title']      = 'Kirtan Sohila';
			$page['audio']            = 'kirtan_sohila.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Kirtan Sohila with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
			
		}
		
		//Anand Sahib(Bhog)
		function anand_sahib_bhog($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 34;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 2;
			$first_page_index = 0;
			$total_page_index = 25;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_anand_sahib_bhog($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']     = 'baanis/anand-sahib-bhog';
			
			$page['baani_title']  = 'Anand Sahib (Bhog)';
			$page['audio']        = 'anand_sahib_bhog.mp3';
			$page['current_page'] = $current_page;

            $page['theme'] = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Anand Sahib (Bhog) with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
			
		}
		
		//Anand Sahib
		function anand_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 210;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 9;
			$first_page_index = 0;
			$total_page_index = 200;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_anand_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/anand-sahib';
			
			$page['baani_title']      = 'Anand Sahib';
			$page['audio']            = 'anand_sahib.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Anand Sahib  with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
			
		}
		
		//Rehraas Sahib
		function rehraas_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 357;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 15;
			$first_page_index = 0;
			$total_page_index = 350;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_rehraas_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/rehraas-sahib';
			
			$page['baani_title']      = 'Rehraas Sahib';
			$page['audio']            = 'rehraas_sahib.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Rehraas Sahib with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
			
		}
		
		//Laavan( Anand Karaj)
		function laavan_anand_karaj($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 25;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 1;
			$first_page_index = 0;
			$total_page_index = 0;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_laavan_anand_karaj($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']     = 'baanis/laavan-anand-karaj';
			
			$page['baani_title']  = 'Laavan( Anand Karaj)';
			$page['audio']        = 'laavan_anand_karaj.mp3';
			$page['current_page'] = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Laavan( Anand Karaj) with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Asa Ki Vaar
		function asa_ki_vaar($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 642;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 26;
			$first_page_index = 0;
			$total_page_index = 625;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_asa_ki_vaar($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/asa-ki-vaar';
			
			$page['baani_title']      = 'Asa Ki Vaar';
			$page['audio']            = 'asa_ki_vaar.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Asa Ki Vaar with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		
		//Sidh Gosht
		function sidh_gosht($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 406;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 17;
			$first_page_index = 0;
			$total_page_index = 400;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_sidh_gosht($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/sidh-gosht';
			$page['baani_title']      = 'Sidh Gosht';
			
			$page['audio']            = 'sidh_gosht.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Sidh Gosht with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Ramkali Sadh
		function ramkali_sadh($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 38;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 2;
			$first_page_index = 0;
			$total_page_index = 25;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_ramkali_sadh($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/ramkali-sadh';
			
			$page['baani_title']      = 'Ramkali Sadh';
			$page['audio']            = 'ramkali_sadh.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Ramkali Sadh with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Dhakanee Oankaar
		function dhakanee_oankaar($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 399;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 16;
			$first_page_index = 0;
			$total_page_index = 375;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_dhakanee_oankaar($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/dhakanee-oankaar';
			
			$page['baani_title']      = 'Dhakanee Oankaar';
			$page['audio']            = 'dhakanee_oankaar.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Dhakanee Oankaar with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Baavan Akhree
		function baavan_akhree($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 689;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 28;
			$first_page_index = 0;
			$total_page_index = 675;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_baavan_akhree($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/baavan-akhree';
			
			$page['baani_title']      = 'Baavan Akhree';
			$page['audio']            = 'baavan_akhree.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Baavan Akhree with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Baarah Maaha
		function baarah_maaha($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 104;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 5;
			$first_page_index = 0;
			$total_page_index = 100;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_baarah_maaha($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/baarah-maaha';
			
			$page['baani_title']      = 'Baarah Maaha';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Baarah Maaha with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Salok Sehskritee
		function salok_sehskritee($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count = 261;
			$limit        = 25;
			
			$current_page     = ($index / 25) + 1;
			$total_page       = 11;
			$first_page_index = 0;
			$total_page_index = 250;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_salok_sehskritee($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/salok-sehskritee';
			
			$page['baani_title']      = 'Salok Sehskritee';
			$page['audio']            = 'salok_sehskritee.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Salok Sehskritee with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Gathaa
		function gathaa($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 61;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 3;
			$first_page_index = 0;
			$total_page_index = 50;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_gathaa($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/gathaa';
			
			$page['baani_title']      = 'Gathaa';
			$page['audio']            = 'gathaa.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Gathaa with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Phunhay M: 5
		function phunhay_m5($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 94;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 4;
			$first_page_index = 0;
			$total_page_index = 75;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_phunhay_m5($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/phunhay-m5';
			
			$page['baani_title']      = 'Phunhay M:5';
			$page['audio']            = 'phunhay_m5.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Phunhay M: 5 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Chaubolay M:5
		function chaubolay_m5($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count = 24;
			$limit        = 25;
			
			$current_page     = ($index / 25) + 1;
			$total_page       = 1;
			$first_page_index = 0;
			$total_page_index = 0;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_chaubolay_m5($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/chaubolay-m5';
			
			$page['baani_title']      = 'Chaubolay M:5';
			$page['audio']            = 'chaubolay_m5.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Chaubolay M:5 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Salok Kabeer ji
		function salok_kabeer_ji($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 494;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 20;
			$first_page_index = 0;
			$total_page_index = 475;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_salok_kabeer_ji($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			$page['base_url']         = 'baanis/salok-kabeer-ji';
			$page['baani_title']      = 'Salok Kabeer ji';
			$page['audio']            = 'salok_kabeer_ji.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Salok Kabeer ji with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Salok Farid ji
		function salok_farid_ji($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 297;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 12;
			$first_page_index = 0;
			$total_page_index = 275;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_salok_farid_ji($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/salok-farid-ji';
			
			$page['baani_title']      = 'Salok Farid ji';
			$page['audio']            = 'salok_farid_ji.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Salok Farid ji with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Savaiye M: 1
		function savaiye_m1($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 52;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 3;
			$first_page_index = 0;
			$total_page_index = 50;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_savaiye_m1($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/savaiye-m1';
			
			$page['baani_title']      = 'Savaiye M:1';
			$page['audio']            = 'savaiye_m1.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Savaiye M: 1 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Savaiye M: 2
		function savaiye_m2($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 52;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 3;
			$first_page_index = 0;
			$total_page_index = 50;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_savaiye_m2($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/savaiye-m2';
			
			$page['baani_title']      = 'Savaiye M:2';
			$page['audio']            = 'savaiye_m2.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Savaiye M: 2 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Savaiye M: 3
		function savaiye_m3($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 124;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 5;
			$first_page_index = 0;
			$total_page_index = 100;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_savaiye_m3($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/savaiye-m3';
			
			$page['baani_title']      = 'Savaiye M:3';
			$page['audio']            = 'savaiye_m3.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Savaiye M: 3 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Savaiye M: 4
		function savaiye_m4($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 322;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 13;
			$first_page_index = 0;
			$total_page_index = 300;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_savaiye_m4($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/savaiye-m4';
			
			$page['baani_title']      = 'Savaiye M:4';
			$page['audio']            = 'savaiye_m4.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Savaiye M: 4 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Savaiye M: 5
		function savaiye_m5($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count = 105;
			$limit        = 25;
			
			$current_page     = ($index / 25) + 1;
			$total_page       = 5;
			$first_page_index = 0;
			$total_page_index = 100;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_savaiye_m5($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			$page['base_url']         = 'baanis/savaiye-m5';
			$page['baani_title']      = 'Savaiye M:5';
			$page['audio']            = 'savaiye_m5.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Savaiye M: 5 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Salok M: 9
		function salok_m9($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 117;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 5;
			$first_page_index = 0;
			$total_page_index = 100;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_salok_m9($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/salok-m9';
			
			$page['baani_title']      = 'Salok M: 9';
			$page['audio']            = 'salok_m9.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Salok M: 9 with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Akal Ustati
		function akal_ustati($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 1092;
			$limit            = 50;
			$current_page     = ($index / 50) + 1;
			$total_page       = 22;
			$first_page_index = 0;
			$total_page_index = 1050;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_akal_ustati($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/akal-ustati';
			
			$page['baani_title']      = 'Akal Ustati';
			$page['audio']            = 'akal_ustati.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Akal Ustati with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Bachitar Natak
		function bachitar_natak($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 1958;
			$limit            = 50;
			$current_page     = ($index / 50) + 1;
			$total_page       = 40;
			$first_page_index = 0;
			$total_page_index = 1950;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_bachitar_natak($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/bachitar-natak';
			
			$page['baani_title']      = 'Bachitar Natak';
			$page['audio']            = 'bachitar_natak.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Bachitar Natak with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';
			
			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Shabad Hazare
		function shabad_hazare($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count = 103;
			$limit        = 25;
			
			$current_page     = ($index / 25) + 1;
			$total_page       = 5;
			$first_page_index = 0;
			$total_page_index = 100;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_shabad_hazare($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/shabad-hazare';
			
			$page['baani_title']      = 'Shabad Hazare';
			$page['audio']            = 'shabad_hazare.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Shabad Hazare with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Sukhmana sahib
		function sukhmana_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 460;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 19;
			$first_page_index = 0;
			$total_page_index = 450;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_sukhmana_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/sukhmana-sahib';
			
			$page['baani_title']      = 'Sukhmana sahib';
			$page['audio']            = 'sukhmana_sahib.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Sukhmana Sahib with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Dukh Bhanjani Sahib
		function dukh_bhanjani_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 288;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 12;
			$first_page_index = 0;
			$total_page_index = 275;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_dukh_bhanjani_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/dukh-bhanjani-sahib';
			
			$page['baani_title']      = 'Dukh Bhanjani Sahib';
			$page['audio']            = 'dukh_bhanjani_sahib.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Dukh Bhanjani Sahib with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Sukhmani Sahib
		function sukhmani_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 2027;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 82;
			$first_page_index = 0;
			$total_page_index = 2025;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_sukhmani_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			$page['base_url']         = 'baanis/sukhmani-sahib';
			$page['baani_title']      = 'Sukhmani Sahib';
			$page['audio']            = 'sukhmani_sahib.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Sukhmani Sahib with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Japji Sahib
		function japji_sahib($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count     = 385;
			$limit            = 25;
			$current_page     = ($index / 25) + 1;
			$total_page       = 16;
			$first_page_index = 0;
			$total_page_index = 375;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_japji_sahib($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/japji-sahib';
			
			$page['baani_title']      = 'Japji Sahib';
			$page['audio']            = 'japji_sahib.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Japji Sahib with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Japji Sahib, Jaap Sahib, Tvai Prasadh Savaiye, Chaupai Sahib, Anand Sahib, Rehraas Sahib, Kirtan Sohila, Anand Sahib(Bhog), Laavan( Anand Karaj), Asa Ki Vaar, Sukhmani Sahib, Sidh Gosht, Ramkali Sadh, Dhakanee Oankaar, Baavan Akhree, Shabad Hazare, Baarah Maaha, Sukhmana sahib, Dukh Bhanjani Sahib, Salok Sehskritee, Gathaa, Phunhay M: 5, Chaubolay M:5, Salok Kabeer ji, Salok Farid ji, Savaiye M: 1, Savaiye M: 2, Savaiye M: 3, Savaiye M: 4, Savaiye M: 5, Salok M: 9, Akal Ustati, Bachitar Natak';

            // load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//Aarti
		function aarti($index = 0, $ajax = 'no')
		{
			$this->load->library('pagination');
			$record_count = 87;
			$limit        = 25;
			
			$current_page     = ($index / 25) + 1;
			$total_page       = 4;
			$first_page_index = 0;
			$total_page_index = 75;
			
			$pagination
				= '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-4 col-xs-4">
			
		</div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $total_page . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
		    <div class="ang-paginate">';
			
			if ($current_page > 1)
			{
				$pagination .= '<button onclick="loadPagebaanis(\'' . $first_page_index . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
				if ($current_page + 1 <= $total_page)
				{
					$pagination .= '<button onclick="loadPagebaanis(\'' . ($index - 25) . '\');" href="javascript:void(0);" class="btn btn-next">Back</button> ';
					
				}
				elseif ($current_page + 1 > $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index - 25) . '\')" class="btn btn-next">Back</button> ';
					
				}
			}
			
			if ($current_page < $total_page)
			{
				$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($index + 25) . '\')" class="btn btn-next">Next</button> ';
				if ($current_page - 1 < $total_page)
				{
					$pagination .= '<button href="javascript:void(0);" onclick="loadPagebaanis(\'' . ($total_page_index) . '\')" class="btn btn-next">Last</button> ';
				}
			}
			
			$pagination .='
			</div>
		</div>
	</div>	
</div>';
			
			
			$page['pagination']       = $pagination;
			$page['lines']            = $this->baani_dao->get_aarti($index);
			$page['results_info']     = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + $limit > $record_count ? $record_count : $index + $limit),
				"total_results" => $record_count
			);
			$page['pagination_links'] = $this->pagination->create_links();
			
			$page['base_url']         = 'baanis/aarti';
			
			$page['baani_title']      = 'Aartee';
			$page['audio']            = 'aarti.mp3';
			$page['current_page']     = $current_page;

            $page['theme']            = 'theme_7';
            $page['meta_title']       = $page['baani_title'] . ' -: Page : ' . $current_page . ' :- SearchGurbani.com';
            $page['meta_description'] = 'Explore, Learn, Relish Aarti with audio at  SearchGurbani.com';
            $page['meta_keywords']    = 'Aarti, Gopal Thaera Aarta';

			// load the page
			if ($ajax == 'no')
			{
				$this->load->view('baanis/baani', $page);
			}
			else
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('baanis/baani-ajax', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
		}
		
		//----
	}