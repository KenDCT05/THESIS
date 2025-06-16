<svg width="120" height="60" viewBox="0 0 120 60" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <!-- Multiple gradients for depth -->
    <linearGradient id="mainGradient" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#B91C3C;stop-opacity:1" />
      <stop offset="50%" style="stop-color:#800020;stop-opacity:1" />
      <stop offset="100%" style="stop-color:#5A1A1A;stop-opacity:1" />
    </linearGradient>
    
    <!-- Drop shadow filter -->
    <filter id="dropShadow" x="-50%" y="-50%" width="200%" height="200%">
      <feDropShadow dx="4" dy="6" stdDeviation="3" flood-color="#800020" flood-opacity="0.4"/>
    </filter>
    
    <!-- Text shadow filter -->
    <filter id="textGlow" x="-50%" y="-50%" width="200%" height="200%">
      <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
      <feMerge> 
        <feMergeNode in="coloredBlur"/>
        <feMergeNode in="SourceGraphic"/> 
      </feMerge>
    </filter>
  </defs>
  
  <!-- Main LMS Text centered -->
  <g font-family="serif" font-weight="900" filter="url(#textGlow)" text-anchor="middle">
    <text x="60" y="40" font-size="28" fill="url(#mainGradient)" filter="url(#dropShadow)">LMS</text>
  </g>
</svg>