<div class="d-flex flex-column flex-shrink-0 p-3 text-black " style="width: 280px;">
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="{{ route('teachers') }}" class="nav-link text-dark text-decoration-none">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#table"></use>
        </svg>
        Dashboard
      </a>
    </li>
  </ul>

  <hr>

  <ul class="nav nav-pills flex-column mb-auto">

    <li>
      <a href="{{ route('teachers') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#table"></use>
        </svg>
        Teachers
      </a>
    </li>
    <li>
      <a href="{{ route('addTeacher') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#table"></use>
        </svg>
        Add Teacher
      </a>
    </li>
    <li>
      <a href="{{ route('subjects') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#grid"></use>
        </svg>
        Subjects
      </a>
    </li>
    <li>
      <a href="{{ route('addSubject') }}" class="nav-link text-dark ">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#grid"></use>
        </svg>
        Add Subject
      </a>
    </li>
    <li>
      <a href="{{ route('classes') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Classes
      </a>
    </li>
    <li>
      <a href="{{ route('addClass') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Add Class
      </a>
    </li>
    <li>
      <a href="{{ route('testimonials') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Testismonial
      </a>
    </li>
    <li>
      <a href="{{ route('addTestimonial') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Add Testimonial
      </a>
    </li>
    <li>
      <a href="{{ route('trashed') }}" class="nav-link text-dark">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Deleted teachers
      </a>
    </li>
  </ul>


</div>